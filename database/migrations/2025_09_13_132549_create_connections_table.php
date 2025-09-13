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
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reseller_id')->constrained('users')->cascadeOnDelete();
            $table->enum('status', ['pending','accepted','rejected','blocked'])->default('pending');
            $table->dateTime('requested_at');
            $table->dateTime('responded_at')->nullable();
            $table->string('message', 255)->nullable();
            $table->timestamps();

            // Constraints / índices
            $table->unique(['producer_id','reseller_id']);
            $table->index('status');
            $table->index(['producer_id','status']);
            $table->index(['reseller_id','status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
