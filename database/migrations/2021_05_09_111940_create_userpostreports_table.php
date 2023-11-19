<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpostreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpostreports', function (Blueprint $table) {
            $table->bigincrements('reportsrno');
            $table->integer('reportpostsrno');
            $table->string('reportpostusername');
            $table->string('reportedby');
            $table->string('reportoption');
            $table->longText('reportcomment')->nullable();
            $table->datetime('report_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userpostreports');
    }
}
