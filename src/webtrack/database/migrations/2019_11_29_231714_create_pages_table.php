<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
               ->onDelete('cascade');

            $table->bigInteger('url_id')->unsigned();
            $table->foreign('url_id')
                ->references('id')->on('urls')
                ->onDelete('cascade');

            $table->string('url','1024');
            $table->text('title')->nullable();
            $table->integer('status')->nullable();
            $table->boolean('is_crawled');

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
        Schema::dropIfExists('pages');
    }
}
