<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('repair_guides', function (Blueprint $table) {
            $table->string('pdf_panduan')->nullable()->after('catatan_keseluruhan');
        });
    }

    public function down(): void
    {
        Schema::table('repair_guides', function (Blueprint $table) {
            $table->dropColumn('pdf_panduan');
        });
    }
};