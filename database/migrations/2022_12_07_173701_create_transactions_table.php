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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('price');
            $table->string('date');
            $table->string('excursion_id');
            $table->string('description')->nullable();
            $table->string('order_id');
            $table->string('session_id');
            $table->string('tran_id')->nullable();
            $table->string('tran_time')->nullable();
            $table->enum('status', ['CREATED', 'CANCELED', 'DECLINED', 'ERROR', 'SUCCEEDED'])->default('CREATED');
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
        Schema::dropIfExists('transactions');
    }
};
