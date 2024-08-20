<?php

namespace App\Transformers;

use App\Models\Article;
use Carbon\Carbon;

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
            'published_date' => Carbon::parse($article->published_date)->toFormattedDateString(),
            'is_published' => $article->is_published,
        ];
    }
}
