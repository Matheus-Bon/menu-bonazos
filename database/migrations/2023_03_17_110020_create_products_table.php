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
            $table->uuid('unit_id');
            $table->tinyText('name');
            $table->unsignedDecimal('discount',8,2)->nullable();
            $table->unsignedDecimal('weight',8,3)->nullable();
            $table->boolean('available'); 
            $table->text('description')->nullable();
            $table->enum('server_people', ['Não se aplica','1 pessoa','2 pessoas','3 pessoas','4 pessoas']);
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
