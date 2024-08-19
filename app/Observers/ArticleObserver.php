<?php

namespace App\Observers;

use App\Models\Article;

use Illuminate\Support\Str;

class ArticleObserver
{
    /**
     * Handle the Article "creating" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function creating(Article $article)
    {
        $article->slug = Str::slug($article->title);
    }

    /**
     * Handle the Article "updating" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updating(Article $article)
    {
        if ($article->isDirty('title')) {
            $article->slug = Str::slug($article->title);
        }
    }
}
