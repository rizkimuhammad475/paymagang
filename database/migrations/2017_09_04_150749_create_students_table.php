<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gender');
            $table->string('nisn');
            $table->string('nis');
            $table->integer('grade_id')->unsigned()->index('students_grade_id_foreign');
            $table->foreign('grade_id')->references('id')->on('grades')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('division_id')->unsigned()->index('students_division_id_foreign');
            $table->foreign('division_id')->references('id')->on('divisions')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('students');
    }
}
