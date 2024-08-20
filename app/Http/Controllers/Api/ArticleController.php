<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlePostRequest;
use App\Http\Repositories\ArticleRepository;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        return $this->repository->getAll($search);
    }

    public function store(ArticlePostRequest $request)
    {
        $article = $this->repository->create($request->validated());

        return response()->json($article, 201);
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function update(ArticlePostRequest $request, Article $article)
    {
        $article = $this->repository->update($article, $request->validated());

        return response()->json($article, 200);
    }

    public function destroy(Article $article)
    {
        $this->repository->delete($article);

        return response()->json(null, 204);
    }
}
