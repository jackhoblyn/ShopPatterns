<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('name');
            $table->text('address1');
            $table->text('address2');
            $table->text('country');
            $table->text('card_number');
            $table->integer('expMonth');
            $table->integer('expYear');
            $table->integer('CVC');
            $table->float('amount')->default(0.00);
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
        Schema::dropIfExists('orders');    
    }
}
