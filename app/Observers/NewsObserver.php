<?php

namespace App\Observers;

use App\Models\News;
use App\Handlers\SlugTranslateHandler;
use  Illuminate\Support\Str;
use Log;

class NewsObserver
{

    /**
     * 保存触发
     */
    public function saving(News $news)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $news->slug) {
            $news->slug = app(SlugTranslateHandler::class)->translate($news->title);
        }

        // 如果 keywords 字段无内容，即生成
        if( !$news->keywords )
        {
            // $keywords = $this->make_excerpt($news->keywords, 50);
            // 皆时使用ai智能分析

        }

    }

    /**
     * Handle the news "created" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function created(News $news)
    {
        //
    }

    /**
     * Handle the news "updated" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function updated(News $news)
    {
        //
    }

    /**
     * Handle the news "deleted" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the news "restored" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the news "force deleted" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
