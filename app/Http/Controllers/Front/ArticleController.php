<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return Response
     */
    public function show(Article $article)
    {
        $relations = Article::orderBy('id', 'desc')
            ->where('id', '<>', $article->id)->get();

        return view('front.articles.show', compact('article', 'relations'));
    }
}
