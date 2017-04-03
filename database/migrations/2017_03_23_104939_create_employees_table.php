<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('position');
            $table->date('recruited');
            $table->decimal('salary', 8, 2);
            $table->string('photo')->nullable();
            $table->string('thumb')->nullable();
            $table->integer('chief')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('chief')
                    ->references('id')->on('employees')
                    ->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
