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
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            // foreignId() is to add a new column to the table.
            // Specifically the column that is foreign key

            // constrained() automatically sets up a foreign key constraint for the category_id column.
            // It assumes the foreign key references the id column in the category table.
            // Ensures integrity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
