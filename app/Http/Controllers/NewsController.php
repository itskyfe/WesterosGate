<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $category = $request->get('category');

        $query = Article::published()->latest();

        if ($search) {
            $query->search($search);
        }

        if ($category) {
            $query->where('category', $category);
        }

        $articles = $query->paginate(9)->withQueryString();
        $featured  = Article::published()->latest()->first();
        $trending  = Article::published()->latest()->take(5)->get();
        $categories = Article::published()->distinct()->pluck('category');

        return view('public.index', compact('articles', 'featured', 'trending', 'categories', 'search', 'category'));
    }

    public function show($slug)
    {
        $query = Article::where('slug', $slug);

        // Admin bisa melihat artikel draft/unpublished
        if (!Auth::guard('admin')->check()) {
            $query->published();
        }

        $article  = $query->firstOrFail();
        $related  = Article::published()
            ->where('category', $article->category)
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();

        return view('public.show', compact('article', 'related'));
    }
}
