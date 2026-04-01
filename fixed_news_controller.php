<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        
        // Set published_at if status is published and no date provided
        if ($validated['status'] === 'published' && (!isset($validated['published_at']) || !$validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle image upload
        if ($request->hasFile('main_image')) {
            $imagePath = $request->file('main_image')->store('news', 'public');
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
        
        // Set published_at if status is published and no date provided
        if ($validated['status'] === 'published' && (!isset($validated['published_at']) || !$validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle image upload
        if ($request->hasFile('main_image')) {
            // Delete old image if exists
            if ($article->main_image) {
                Storage::disk('public')->delete($article->main_image);
            }
            
            $imagePath = $request->file('main_image')->store('news', 'public');
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
        
        // Delete image if exists
        if ($article->main_image) {
            Storage::disk('public')->delete($article->main_image);
        }
        
        $article->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News article deleted successfully!');
    }
}
