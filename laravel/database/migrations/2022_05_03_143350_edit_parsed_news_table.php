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
        Schema::create('parsed_news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('link',255)->nullable();
            $table->string('image', 255)->nullable();
            $table->text('description');
            $table->string('category', 255)->nullable();
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
        Schema::dropIfExists('parsed_news');
    }
};
