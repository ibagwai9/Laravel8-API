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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('abstract');
            $table->text('author')->nullable();
            $table->text('publisher')->nullable();
            $table->text('publication_date')->nullable();
            $table->text('publisher_address')->nullable();
            $table->text('url')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->text('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
};
