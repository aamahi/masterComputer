<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jomas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customar_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('withdraw')->nullable();
            $table->integer('deposite')->nullable();
            $table->longText('description')->nullable();
            $table->foreign('customar_id')->references('id')->on('customars')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('jomas');
    }
}
