<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvilableDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avilable_days', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('mentor_id');
            $table->date('date')->nullable();
            $table->string('day');
            $table->time('from_time');
            $table->time('to_time');
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
        Schema::dropIfExists('avilable_days');
    }
}
