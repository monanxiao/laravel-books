<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->jsonb('area')->comment('地区');
            $table->ipAddress('visitor')->comment('ip地址');
            $table->integer('link_id')->nullable()->comment('关联ID');
            $table->string('page')->notnullable()->comment('访问页面');
            $table->integer('time')->default(1)->comment('次数');
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
        Schema::dropIfExists('visitors');
    }
}
