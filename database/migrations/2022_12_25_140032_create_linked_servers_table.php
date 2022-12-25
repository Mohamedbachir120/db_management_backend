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
        Schema::create('linked_servers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('create_method')->nullable();
            $table->string('creation_date')->nullable();
            $table->unsignedBigInteger('source_id');
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('access_id');


            $table->foreign('source_id')->references('id')->on('servers')
            ->onDelete('cascade');

            $table->foreign('destination_id')->references('id')->on('servers')
            ->onDelete('cascade');       

            $table->foreign('access_id')->references('id')->on('accesses')
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
        Schema::dropIfExists('linked_servers');
    }
};
