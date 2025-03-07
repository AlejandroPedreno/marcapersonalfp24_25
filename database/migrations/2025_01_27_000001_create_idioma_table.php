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
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->char('alpha2', 2)->notNullable();
            $table->char('alpha3t', 3)->notNullable();
            $table->char('alpha3b', 3)->notNullable();
            $table->char('english_name', 100)->notNullable();
            $table->char('native_name', 100)->notNullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idioma');
    }
};
