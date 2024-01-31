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

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->index();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete("cascade");
            $table->enum('type', ['Quantum Computing', 'AI Ethics', 'Space Exploration', 'BioTechnology', 'Renewable Energy']);
            $table->string('title');
            $table->longText('description');
            $table->date('publicate_date');
            $table->bigInteger('like');
            $table->bigInteger('comment');
            $table->bigInteger('share');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
