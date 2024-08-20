<?php

namespace App\Http\Repositories;

use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Support\Str;

class ArticleRepository
{
    public function getAll($search = '')
    {
        $query = Article::query();

        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%")
            ->orWhere('excerpt', 'LIKE', "%{$search}%")
            ->orWhere('author', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%");
        }

        $articles = $query->latest()->paginate();

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
