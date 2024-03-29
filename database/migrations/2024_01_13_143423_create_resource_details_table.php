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

        Schema::create('resource_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resource_id')->index();
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete("cascade");
            $table->longText('job');
            $table->text('image');
            $table->string('publication_date');
            $table->bigInteger('total_download');
            $table->text('download_formate');
            $table->string('total_number');
            $table->string('average_author_expertise');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_details');
    }
};
