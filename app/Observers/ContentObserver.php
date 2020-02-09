<?php

namespace App\Observers;

use App\Models\Content;

class ContentObserver
{
    /**
     * Handle the content "created" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function created(Content $content)
    {
        \Log::info('Content Updated');
        \Log::info($content);
    }

    /**
     * Handle the content "updated" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function updated(Content $content)
    {
        \Log::info('Content Updated');
        \Log::info($content);
    }

    /**
     * Handle the content "deleted" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function deleted(Content $content)
    {
        //
    }

    /**
     * Handle the content "restored" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function restored(Content $content)
    {
        //
    }

    /**
     * Handle the content "force deleted" event.
     *
     * @param  \App\Models\Content  $content
     * @return void
     */
    public function forceDeleted(Content $content)
    {
        //
    }
}
