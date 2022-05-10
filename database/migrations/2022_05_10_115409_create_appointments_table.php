<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('mentor_id');
            $table->bigInteger('user_id');
            $table->text('reson')->nullable();
            $table->string('document')->nullable();
            $table->tinyInteger('method')->nullable();
            $table->tinyInteger('medium')->nullable();
            $table->text('details')->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('is_paid')->nullable();
            $table->tinyInteger('is_approved')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
