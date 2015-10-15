<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use App\Article;

class ArticleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catId = Input::get('id');
        $articles = Article::orderBy('id', 'desc');

        if ($catId) {
            $articles->where('category_id', $catId);
        }

        $articles = $articles->paginate(20);

        return view('admin.articles.index', compact('articles', 'catId'));
    }

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

        return view('admin.articles.create', compact('article', 'relations'));
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

        return redirect('quan-tri/bai-viet')->with('flash_message', Lang::get('system.store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article  $article
     * @return Response
     */
    public function edit(Article $article)
    {
        $relations = Article::orderBy('id', 'desc')
            ->where('id', '<>', $article->id)
            ->where('category_id', $article->category_id)
            ->get();

        return view('admin.articles.edit', compact('article', 'relations'));
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

        return redirect('quan-tri/bai-viet')->with('flash_message', Lang::get('system.update'));
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

        return redirect('quan-tri/bai-viet')->with('flash_message', Lang::get('system.destroy'));
    }
}
