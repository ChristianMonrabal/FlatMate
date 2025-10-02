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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_id')->constrained('ads');
            $table->foreignId('landlord_id')->constrained('users');
            $table->foreignId('tenant_id')->constrained('users');
            $table->foreignId('status_id')->constrained('statuses'); // relación directa
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('monthly_rent',10,2);
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
