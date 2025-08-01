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
        Schema::create('linkables', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('section_id')->unsigned();
			$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
			$table->morphs('linkable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
