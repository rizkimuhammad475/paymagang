<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->unsigned()->index('grades_division_id_foreign');
            $table->foreign('division_id')->references('id')->on('divisions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('step_id')->unsigned()->index('grades_step_id_foreign');
            $table->foreign('step_id')->references('id')->on('steps')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
