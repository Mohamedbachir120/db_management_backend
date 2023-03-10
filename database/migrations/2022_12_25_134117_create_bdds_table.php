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
        Schema::create('bdds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('engine');
            $table->string('creation_date');
            $table->string('status');
            $table->unsignedBigInteger('sgbd_id');
            $table->unsignedBigInteger('server_id');

            $table->foreign('sgbd_id')->references('id')->on('sgbds')
            ->onDelete('cascade');

            $table->foreign('server_id')->references('id')->on('servers')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('bdds');
    }
};
