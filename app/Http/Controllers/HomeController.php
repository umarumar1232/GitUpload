<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $articles = Article::paginate(6);
        $popularArticle = Article::popularThisWeek()->first();
        $categories = Category::all();

        return view('home', compact('popularArticle', 'articles', 'categories'));
    }

    public function show(Article $article): View
    {
        $latestArticles = Article::latest()->take(5)->get();
        $article->visit()->withIP();

        return view('articles.show', compact('article', 'latestArticles'));
    }
}
