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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('unit_id')->nullable()->unique();
            $table->tinyText('name');
            $table->boolean('available'); 
            $table->text('description')->nullable();
            $table->set('server_people', ['0', '1', '2', '3', '4', '+4']);
            $table->timestamps();
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
