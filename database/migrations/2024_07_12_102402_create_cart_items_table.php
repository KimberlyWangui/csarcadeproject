<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('username')->nullable();
            $table->unsignedBigInteger('ticket_id');
            $table->string('ticket_type');
            $table->integer('quantity');
            $table->decimal('ticket_price', 8, 2); // Added column for ticket price
            $table->decimal('total_amount', 8, 2); // Added column for total amount
            $table->timestamps();

            $table->foreign('user_id')->references('userid')->on('users')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
