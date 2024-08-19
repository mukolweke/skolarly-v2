<?php

namespace App\Http\Repositories;

use App\Models\Article;
use Illuminate\Support\Str;

class ArticleRepository
{
    public function getAll()
    {
        return Article::all();
    }

    public function create(array $data)
    {
        $data['slug'] = Str::slug($data['title']);

        return Article::create($data);
    }

    public function findBySlug($slug)
    {
        return Article::where('slug', $slug)->first();
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
