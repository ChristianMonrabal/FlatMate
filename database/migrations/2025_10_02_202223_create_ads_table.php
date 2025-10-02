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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('status_id')->constrained('statuses');
            $table->string('title');
            $table->text('description');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code',20);
            $table->string('floor',50)->nullable();
            $table->integer('area')->nullable();
            $table->integer('rooms')->default(1);
            $table->integer('bathrooms')->default(1);
            $table->boolean('terrace')->default(false);
            $table->boolean('storage')->default(false);
            $table->decimal('monthly_price',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
