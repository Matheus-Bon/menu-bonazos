<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id');
            $table->tinyText('local_name');
            $table->tinyText('street');
            $table->tinyText('district');
            $table->tinyText('city')->nullable();
            $table->tinyText('state');
            $table->text('complement');
            $table->tinyText('zip_code');
            $table->boolean('standard_address');
            $table->timestamps();
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
