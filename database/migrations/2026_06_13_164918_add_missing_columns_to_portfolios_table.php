<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            // Cek dan tambah kolom is_featured
            if (!Schema::hasColumn('portfolios', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->after('is_active');
            }
            
            // Cek dan tambah kolom order (untuk sorting)
            if (!Schema::hasColumn('portfolios', 'order')) {
                $table->integer('order')->default(0)->after('is_featured');
            }
            
            // Cek dan tambah kolom view_count (opsional)
            if (!Schema::hasColumn('portfolios', 'view_count')) {
                $table->integer('view_count')->default(0)->after('order');
            }
            
            // Cek dan tambah kolom gallery (untuk multiple images)
            if (!Schema::hasColumn('portfolios', 'gallery')) {
                $table->text('gallery')->nullable()->after('image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['is_featured', 'order', 'view_count', 'gallery']);
        });
    }
};