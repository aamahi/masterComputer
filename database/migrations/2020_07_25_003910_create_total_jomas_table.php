<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalJomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_jomas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customar_id')->unique();
            $table->integer('withdraw')->default(0);
            $table->integer('deposite')->default(0);
            $table->foreign('customar_id')->references('id')->on('customars')->onDelete('cascade');
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
        Schema::dropIfExists('total_jomas');
    }
}
