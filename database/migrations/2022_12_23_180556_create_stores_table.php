<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('password_type_id');
            $table->string('title');
            $table->string('username');
            $table->string('password');
            $table->boolean('strong_password')->nullable()->default(false);
            $table->string('url')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->foreign('password_type_id')->references('id')->on('password_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
