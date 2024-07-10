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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('game_id');
            $table->string('game_name');
             $table->string('video_path');
             $table->integer('quantity')->default(1);
                $table->timestamps();
            

            // Define foreign keys
            $table->foreign('userid')->references('userid')->on('users')->onDelete('cascade');
            
            $table->foreign('game_id')->references('game_id')->on('games')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
;