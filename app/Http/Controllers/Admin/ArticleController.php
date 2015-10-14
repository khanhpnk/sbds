<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use App\Article;

class ArticleController extends BaseController
{
    const INBOX     = 'inbox';
    const SENT      = 'sent';
    const READ      = 'read';
    const UNREAD    = 'unread';

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

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $article = null;
        return view('admin.articles.create', compact('article'));
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
        return view('admin.articles.edit', compact('article'));
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
}
