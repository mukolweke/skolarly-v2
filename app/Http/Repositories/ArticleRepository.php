<?php

namespace App\Http\Repositories;

use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Support\Str;

class ArticleRepository
{
    public function getAll()
    {
        $articles = Article::latest()->paginate(Article::PAGINATION_PER_PAGE);

        ArticleTransformer::transformCollection($articles);

        return $articles;
    }

    public function create(array $data)
    {
        $data['slug'] = Str::slug($data['title']);

        return Article::create($data);
    }

    public function findBySlug($slug)
    {
        $article = Article::where('slug', $slug)->first();

        if (!empty($article)) {
            return ArticleTransformer::transform($article);
        }

        return null;
    }

    public function update(Article $article, array $data)
    {
        if (isset($data['title']) && $data['title'] !== $article->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $article->update($data);

        return $article;
    }

    public function delete(Article $article)
    {
        $article->delete();
    }
}
