<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use App\Models\ContactMessage;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get statistics
        $totalArticles = NewsArticle::count();
        $publishedArticles = NewsArticle::where('status', 'published')->count();
        $draftArticles = NewsArticle::where('status', 'draft')->count();
        $featuredArticles = NewsArticle::where('featured', true)->count();
        
        // Get articles created this week
        $thisWeekArticles = NewsArticle::where('created_at', '>=', Carbon::now()->startOfWeek())->count();
        
        // Get recent articles
        $recentArticles = NewsArticle::with('category')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        // Get unread contacts count
        $unreadContacts = ContactMessage::where('status', 'pending')->count();
        
        return view('admin.dashboard', compact(
            'totalArticles',
            'publishedArticles', 
            'draftArticles',
            'featuredArticles',
            'thisWeekArticles',
            'recentArticles',
            'unreadContacts'
        ));
    }
}
