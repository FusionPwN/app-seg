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
		Schema::table('section_types', function (Blueprint $table) {
			$table->dropColumn('can_be_parent');
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
