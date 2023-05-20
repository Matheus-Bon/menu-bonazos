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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->tinyText('name')->nullable();
            $table->foreignUuid('manager_id');
            $table->tinyText('street')->nullable();
            $table->tinyText('district')->nullable();
            $table->tinyText('city')->nullable();
            $table->tinyText('state')->nullable();
            $table->tinyText('zip_code')->nullable();
            $table->tinyText('phone')->nullable();
            $table->boolean('isOpen')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
