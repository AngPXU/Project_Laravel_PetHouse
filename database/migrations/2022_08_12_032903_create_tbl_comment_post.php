<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCommentPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comment_post', function (Blueprint $table) {
            $table->increments('commentpost_id');
            $table->string('comment_post');
            $table->string('comment_post_name');
            $table->string('comment_post_date');
            $table->integer('comment_post_status');
            $table->integer('comment_post_id');
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
        Schema::dropIfExists('tbl_comment_post');
    }
}
