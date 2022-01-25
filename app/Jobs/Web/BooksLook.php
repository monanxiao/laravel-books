<?php

namespace App\Jobs\Web;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Book;

class BooksLook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $result;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($result)
    {
        //
        $this->result = $result;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Book $book)
    {
        $book->BookLogStore($this->result);
    }
}
