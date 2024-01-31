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

        Schema::create('prodcast_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prodcast_id');
            $table->foreign('prodcast_id')->references('id')->on('prodcasts')->onDelete("cascade");
            $table->longText('job_description');
            $table->integer('total_episodes');
            $table->text('average_length');
            $table->text('release_frequency');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodcast_details');
    }
};
