<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    public function index($filter = 1)
    {
        $article = Article::orderBy('id', 'desc')
            ->where('category_id', $filter)
            ->first();

        if (1 == count($article)) {
            $relations = Article::orderBy('id', 'desc')
                ->where('id', '<>', $article->id)
                ->where('category_id', $filter)
                ->get();
        }

        return view('front.articles.show', compact('article', 'relations'));
    }
    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return Response
     */
    public function show(Article $article)
    {
        $relations = Article::orderBy('id', 'desc')
            ->where('id', '<>', $article->id)
            ->where('category_id', $article->category_id)
            ->get();

        return view('front.articles.show', compact('article', 'relations'));
    }
}
