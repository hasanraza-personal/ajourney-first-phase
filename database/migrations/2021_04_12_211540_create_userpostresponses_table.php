<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpostresponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpostresponses', function (Blueprint $table) {
            $table->integer('postresponse_srno');
            $table->string('response_username');
            $table->string('viewerusername');
            $table->boolean('postlike');
            $table->boolean('postdislike');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userpostresponses');
    }
}
