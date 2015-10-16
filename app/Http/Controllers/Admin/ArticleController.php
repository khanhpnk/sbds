<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use App\Article;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends BaseController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $article = null;
        $catId = Input::get('id');
        $relations = Article::orderBy('id', 'desc')
            ->where('category_id', $catId)
            ->get();

        return view('admin.articles.create', compact('article', 'relations', 'catId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest   $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->create($request->all());

        return Redirect::back()->with('flash_message', Lang::get('system.store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article  $article
     * @return Response
     */
    public function edit(Article $article)
    {
        $catId = $article->category_id;
        $relations = Article::orderBy('id', 'desc')
            ->where('id', '<>', $article->id)
            ->where('category_id', $catId)
            ->get();

        return view('admin.articles.edit', compact('article', 'relations', 'catId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest   $request
     * @param  Article          $article
     * @return Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        return Redirect::back()->with('flash_message', Lang::get('system.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ArticleRequest   $request
     * @return Response
     */
    public function destroy( Article $article)
    {
        $article->delete();

        return Redirect::back()->with('flash_message', Lang::get('system.destroy'));
    }
}
