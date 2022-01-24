<?php

namespace App\Listeners;

use App\Events\BooksVisit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BooksVisitLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BooksVisit  $event
     * @return void
     */
    public function handle(BooksVisit $event)
    {
        //
    }
}
