<?php

namespace App\Transformers;

use App\Models\Article;

class ArticleTransformer
{
    /**
     * @param mixed $articles
     *
     * @return mixed
     */
    public static function transformCollection($articles)
    {
        return $articles->transform(function ($article) {

            return self::transform($article);
        });
    }

    /**
     * @param Article $article
     * @return array
     */
    public static function transform(Article $article) {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'slug' => $article->slug,
            'author' => $article->author,
            'excerpt' => $article->excerpt,
            'content' => $article->content,
            'published_date' => $article->published_date,
            'created_at' => $article->created_at,
            'updated_at' => $article->updated_at,
        ];
    }
}
