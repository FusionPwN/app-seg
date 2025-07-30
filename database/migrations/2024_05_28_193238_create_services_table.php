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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('lead_id')->unsigned();
			$table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
			$table->string('address', 255)->nullable();
			$table->string('floor', 30)->nullable();
			$table->string('door', 30)->nullable();
			$table->string('postal_code', 50)->nullable();
			$table->string('district', 100)->nullable();
			$table->string('city', 100)->nullable();
			$table->string('county', 100)->nullable();
			$table->string('phone', 50)->nullable();
			$table->longText('description')->nullable();
			$table->string('receiver_name', 255)->nullable();
			$table->string('receiver_contact', 100)->nullable();
			$table->string('receiver_relation', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
