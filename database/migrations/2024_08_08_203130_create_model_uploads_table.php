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
        Schema::create('model_uploads', function (Blueprint $table) {
            $table->id();
			$table->morphs('model');
			$table->bigInteger('upload_id')->unsigned();
			$table->foreign('upload_id')->references('id')->on('uploads')->onDelete('cascade');
			$table->tinyInteger('default')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_uploads');
    }
};
