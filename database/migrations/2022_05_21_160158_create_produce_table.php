<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produce', function (Blueprint $table) {
            $table->string('id',255)->primary();
            $table->text('title');
            $table->unsignedBigInteger('farmer_id');
            $table->string('description');
            $table->float('price');//verify from trackfi
            $table->timestamps();
            $table->foreign('farmer_id')
                ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produce');
    }
}
