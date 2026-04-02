<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // Define WOJE categories - now loaded from database
    private function getCategories()
    {
        return \App\Models\NewsCategory::active()->ordered()->get();
    }

    /**
     * Display a listing of the news articles.
     */
    public function index()
    {
        $newsArticles = \App\Models\NewsArticle::with('category')->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.news.index', [
            'newsArticles' => $newsArticles,
            'categories' => $this->getCategories()
        ]);
    }

    /**
     * Show the form for creating a new news article.
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => $this->getCategories()
        ]);
    }

    /**
     * Store a newly created news article in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|exists:news_categories,slug',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean',
            'published_at' => 'nullable|date',
            'date' => 'nullable|date',
            'tags' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get category ID from slug
        $category = \App\Models\NewsCategory::where('slug', $validated['category'])->first();
        $validated['category_id'] = $category->id;
        unset($validated['category']);

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);
        
        // Set published_at based on date field or current time
        if ($validated['status'] === 'published') {
            if (isset($validated['date']) && $validated['date']) {
                // Use date field if provided
                $validated['published_at'] = $validated['date'];
            } elseif (!isset($validated['published_at']) || !$validated['published_at']) {
                // Use current time if no published_at provided
                $validated['published_at'] = now();
            }
        }

        // Handle image upload
        if ($request->hasFile('main_image')) {
            $dir = public_path('images/news');
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $image = $request->file('main_image');
            $imageName = 'news_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/news/' . $imageName;
            $image->move($dir, $imageName);
            $validated['main_image'] = $imagePath;
        }

        // Parse tags
        $tags = [];
        if ($request->has('tags')) {
            $tags = explode(',', $request->input('tags'));
        }
        $validated['tags'] = $tags;

        $article = \App\Models\NewsArticle::create($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News article created successfully!');
    }

    /**
     * Show the form for editing the specified news article.
     */
    public function edit($id)
    {
        $article = \App\Models\NewsArticle::with('category')->findOrFail($id);
        
        return view('admin.news.edit', [
            'article' => $article,
            'categories' => $this->getCategories()
        ]);
    }

    /**
     * Update the specified news article in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|exists:news_categories,slug',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean',
            'published_at' => 'nullable|date',
            'date' => 'nullable|date',
            'tags' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get the article
        $article = \App\Models\NewsArticle::findOrFail($id);

        // Get category ID from slug
        $category = \App\Models\NewsCategory::where('slug', $validated['category'])->first();
        $validated['category_id'] = $category->id;
        unset($validated['category']);

        // Update slug if title changed
        if ($validated['title'] !== $article->title) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        
        // Set published_at based on date field or current time
        if ($validated['status'] === 'published') {
            if (isset($validated['date']) && $validated['date']) {
                // Use date field if provided
                $validated['published_at'] = $validated['date'];
            } elseif (!isset($validated['published_at']) || !$validated['published_at']) {
                // Use current time if no published_at provided
                $validated['published_at'] = now();
            }
        }

        // Handle image upload
        if ($request->hasFile('main_image')) {
            $this->deleteStoredNewsImage($article->main_image);

            $dir = public_path('images/news');
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $image = $request->file('main_image');
            $imageName = 'news_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/news/' . $imageName;
            $image->move($dir, $imageName);
            $validated['main_image'] = $imagePath;
        }

        // Parse tags
        $tags = [];
        if ($request->has('tags')) {
            $tags = explode(',', $request->input('tags'));
        }
        $validated['tags'] = $tags;

        $article->update($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News article updated successfully!');
    }

    /**
     * Remove the specified news article from storage.
     */
    public function destroy($id)
    {
        $article = \App\Models\NewsArticle::findOrFail($id);
        
        $this->deleteStoredNewsImage($article->main_image);

        $article->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News article deleted successfully!');
    }

    /**
     * Remove main image file from disk (public/images/news or storage/app/public).
     */
    private function deleteStoredNewsImage(?string $path): void
    {
        if ($path === null || trim($path) === '') {
            return;
        }

        $path = ltrim(trim($path), '/');

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return;
        }

        if (str_starts_with($path, 'images/')) {
            $full = public_path($path);
            if (is_file($full)) {
                @unlink($full);
            }

            return;
        }

        $relative = str_starts_with($path, 'storage/') ? substr($path, strlen('storage/')) : $path;
        $full = storage_path('app/public/' . $relative);
        if (is_file($full)) {
            @unlink($full);
        }
    }
}
