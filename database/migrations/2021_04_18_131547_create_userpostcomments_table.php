<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpostcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpostcomments', function (Blueprint $table) {
            $table->bigincrements('commentsrno');
            $table->integer('postcomment_srno');
            $table->string('comment_username');
            $table->string('comment_viewerusername');
            $table->longText('comment');
            $table->datetime('comment_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userpostcomments');
    }
}
