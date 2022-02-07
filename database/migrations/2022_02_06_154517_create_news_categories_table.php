<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('news_categorie_id')->comment('文章分类');
            $table->foreign('news_categorie_id')->references('id')->on('news_categories');
            $table->string('title')->index()->comment('文章标题');
            $table->integer('type')->default(0)->comment('文章类型 0 普通文章 、1 图文 2 多图 3 视频');
            $table->text('description')->nullable()->comment('文章描述');
            $table->string('issue_time')->nullable()->comment('发布时间');
            $table->string('author')->nullable()->comment('文章作者|媒体');
            $table->jsonb('keywords')->nullable()->comment('文章关键字');
            $table->longText('content')->nullable()->comment('文章内容');
            $table->string('source')->nullable()->comment('文章来源');
            $table->string('thumb')->nullable()->comment('文章缩略图');
            $table->jsonb('thumbs')->nullable()->comment('文章多图');
            $table->string('slug')->nullable()->comment('友好的url');
            $table->integer('time')->default(0)->comment('阅读数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_categories');
    }
}
