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

        Schema::create('news_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id')->index();
            $table->foreign('news_id')->references('id')->on('news')->onDelete("cascade");
            $table->longText('description_intro');
            $table->date('publicate_date');
            $table->text('image');
            $table->integer('reading_time');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_details');
    }
};
