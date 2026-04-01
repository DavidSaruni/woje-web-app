<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsArticle;
use App\Models\NewsCategory;
use App\Models\ContactMessage;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class WebController extends Controller
{
    public function index(){
        return view('web.index');
    }

    public function news(Request $request){
        $query = NewsArticle::with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->whereNotNull('date');

        // Filter by category if provided
        if ($request->has('category')) {
            $categorySlug = $request->get('category');
            $category = NewsCategory::where('slug', $categorySlug)->first();
            if ($category) {
                $query->whereHas('category', function($q) use ($category) {
                    $q->where('news_categories.id', $category->id);
                });
            }
        }

        // Search functionality
        if ($request->has('search')) {
            $searchTerm = $request->get('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%');
            });
        }

        $news = $query->latest('published_at')->paginate(6);
        
        $categories = NewsCategory::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        return view('web.news', compact('news', 'categories'));
    }

        public function newsReadMore($slug = null){
        if ($slug) {
            $article = NewsArticle::with('category')
                ->where('slug', $slug)
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->whereNotNull('date')
                ->firstOrFail();
            
            // Increment view count
            $article->incrementViews();
            
            // Get related articles
            $relatedArticles = NewsArticle::with('category')
                ->where('id', '!=', $article->id)
                ->where('category_id', $article->category_id)
                ->published()
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
            
            return view('web.newsReadMore', compact('article', 'relatedArticles'));
        }
        
        return view('web.newsReadMore');
    }



    public function courses(){
        // For now, return a static courses page
        // In a real application, this would fetch courses from database
        return view('web.courses');
    }

    public function showCourse($slug){
        // For now, return the course read more page
        // In a real application, this would fetch the specific course from database
        return view('web.courseReadMore');
    }

    public function submitContact(Request $request){
        // Validate the form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);
        
        if($validated){
            // Save to database
            ContactMessage::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'status' => 'pending'
            ]);

            // Send email notification to admin
            try {
                Mail::to('info@woje.org')->send(new ContactMail($validated));
            } catch (\Exception $e) {
                Log::error('Failed to send contact email: ' . $e->getMessage());
            }

            // Return success response
            return redirect()
                ->back()
                ->with('success','Thank you for contacting WOJE! Your message has been received. Our team will get back to you shortly.');
        } else {
            return back()->with('error','Failed to send message');
        }
    }

    public function board(){
        return view('web.board');
    }
}
