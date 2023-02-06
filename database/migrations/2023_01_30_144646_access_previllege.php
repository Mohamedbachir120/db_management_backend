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
        Schema::create('access_previllege', function (Blueprint $table) {

        $table->bigIncrements('id');
        $table->unsignedBigInteger('access_id');
        $table->foreign('access_id')->references('id')->on('accesses')->onDelete('cascade');;
        $table->unsignedBigInteger('previllege_id');
        $table->foreign('previllege_id')->references('id')->on('previlleges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_previllege');

    }
};
