<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('model_id');
            $table->string('title')->unique();;
            $table->string('image')->nullable();;
            $table->longText('description')->nullable();;
            $table->longText('symptomes')->nullable();;
            $table->longText('garantie')->nullable();;
            $table->longText('temps_reparation')->nullable();;
            $table->string('prix')->nullable();;
            $table->timestamps();

            $table->index('model_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparations');
    }
}
