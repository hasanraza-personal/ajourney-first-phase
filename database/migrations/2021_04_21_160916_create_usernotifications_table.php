<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsernotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usernotifications', function (Blueprint $table) {
            $table->bigincrements('notificationsrno');
            $table->string('notificationpostusername');
            $table->integer('notificationpostsrno');
            $table->string('notificationusername');
            $table->string('notificationresponce')->default("");
            $table->integer('notificationcommentsrno')->nullable();
            $table->integer('notificationcomment')->nullable();
            $table->datetime('notification_created');
            $table->integer('notificationread');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usernotifications');
    }
}
