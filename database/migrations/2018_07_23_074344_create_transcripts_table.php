<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranscriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcripts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('project');
        $table->string('idi');
        $table->date('date');
        $table->string('day');
        $table->string('time');
        $table->string('moderator');
        $table->string('criteria');
        $table->string('body')->nullable();
        $table->integer('user_id');
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
        Schema::dropIfExists('transcripts');
    }
}
