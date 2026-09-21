<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('repair_guide_photos', function (Blueprint $table) {
            $table->text('caption')
                ->nullable()
                ->after('foto');
        });

        Schema::table('repair_guide_photos', function (Blueprint $table) {
            $table->dropForeign(['repair_guide_id']);
            $table->dropColumn('repair_guide_id');
            $table->dropColumn('tipe');
        });
    }

    public function down(): void
    {
        Schema::table('repair_guide_photos', function (Blueprint $table) {
            $table->foreignId('repair_guide_id')
                ->nullable()
                ->after('id')
                ->constrained('repair_guides')
                ->cascadeOnDelete();

            $table->enum('tipe', ['before', 'after'])
                ->nullable()
                ->after('foto');
        });

        Schema::table('repair_guide_photos', function (Blueprint $table) {
            $table->dropColumn('caption');
        });
    }
};
