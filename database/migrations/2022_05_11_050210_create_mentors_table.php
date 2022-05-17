<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->integer('district_id')->nullable();
            $table->integer('thana_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('specialist')->nullable();
            $table->string('time_limit')->nullable();
            $table->string('fee')->nullable();
            $table->string('image')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('mentors');
    }
}
