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
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->enum('owner_type', ['user','profile','order']);
            $table->unsignedBigInteger('owner_id');
            $table->string('street', 150);
            $table->string('number', 20)->nullable();
            $table->string('complement', 100)->nullable();
            $table->string('district', 80)->nullable();
            $table->string('city', 100);
            $table->string('state', 50);
            $table->string('zip', 20);
            $table->string('country', 50)->default('BR');
            $table->string('notes', 255)->nullable();
            $table->timestamps();

            $table->index(['owner_type','owner_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
