<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBakiKhatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baki_khatas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customar_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('due')->nullable();
            $table->integer('joma')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('baki_khatas');
    }
}
