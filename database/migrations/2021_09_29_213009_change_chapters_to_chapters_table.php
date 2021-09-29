<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeChaptersToChaptersTable extends Migration
{
    /**
     * Run the migrations.
     * 章节
     * @return void
     */
    public function up()
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->change();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->change();
            $table->string('name')->index()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chapters', function (Blueprint $table) {
            //
            $table->dropColumn(['book_id', 'name']);
        });
    }
}
