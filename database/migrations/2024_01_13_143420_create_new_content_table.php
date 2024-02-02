<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('news_contents', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->unsignedBigInteger('news_id');
            $table->foreign('news_id')->references('id')->on('news_details')->onDelete("cascade");
            $table->timestamps();
        });


        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_content');
    }
};
