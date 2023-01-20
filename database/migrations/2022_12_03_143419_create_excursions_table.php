<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excursions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('age');
            $table->string('price');
            $table->string('place');
            $table->text('program');
            $table->text('duration');
            $table->string('including');
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
        Schema::dropIfExists('excursions');
    }
};
