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
       Schema::create('promotions', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->enum('discount_type', ['percentage', 'nominal']);
        $table->decimal('discount_value', 10, 2);
        $table->text('description')->nullable();
        $table->datetime('valid_from');
        $table->datetime('valid_until');
        $table->decimal('min_purchase', 10, 2)->default(0);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
