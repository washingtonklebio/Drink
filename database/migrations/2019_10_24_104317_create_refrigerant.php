<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefrigerant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refrigerant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mark', 40);
            $table->integer('quantity');
            $table->float('amount');
            $table->unsignedBigInteger('type');
            $table->unsignedBigInteger('flavor');
            $table->unsignedBigInteger('liter');

            $table->foreign('type')->references('id')->on('types');
            $table->foreign('flavor')->references('id')->on('flavors');
            $table->foreign('liter')->references('id')->on('liters');

            $table->unique(['mark', 'liter'], 'single_brand');
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
        Schema::dropIfExists('refrigerant');
    }
}
