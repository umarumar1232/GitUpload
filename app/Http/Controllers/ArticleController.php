<?php

namespace App\Http\Controllers;

use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }
    public function listArticles(): View
    {
        $query=Article::with('categories');
        if (Auth::user()->hasRole('admin')) {
            $articles = $query->get();
        }else{
            $articles = $query->where('user_id', Auth::user()->id)->get();
        }

        return view('articles.list-articles', compact('articles'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('articles.create', compact('categories'));
    }
    
    public function store(StoreArticleRequest $request): RedirectResponse {
        $data = $request->validated();

        if($request->hasFile('cover')){
            $data['cover'] = $request->file('cover')->store('cover', 'public');
        }

        $data['user_id'] = Auth::user()->id;

        $article = Article::create($data);

        if ($article) {
            $article->categories()->sync($data['category']);
        }

        return to_route('list-articles');
    }

    public function edit(Article $article): View
    {
        $categories = Category::all();

        return view('articles.edit', compact('categories', 'article'));
    }
    
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse {
        $data = $request->validated();

        if ($article) {
            if($request->hasFile('cover')){
                if($article->cover && Storage::disk('public')->exists($article->cover)){
                    Storage::disk('public')->delete($article->cover);
                }
                $path = $request->file('cover')->store('cover', 'public');
            }else{
                $path = $article->cover;
            }

            $data['cover'] = $path;

            $article->update($data);
            $article->categories()->sync($data['category']);
        }

        return to_route('list-articles');
    }

    public function destroy(Article $article) : RedirectResponse {
        if($article->cover && Storage::disk('public')->exists($article->cover)){
            Storage::delete($article->cover);
        }
        $article->delete();

        return to_route('list-articles');
    }
}
