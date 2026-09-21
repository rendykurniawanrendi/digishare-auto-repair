<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('repair_guide_videos', function (Blueprint $table) {
            $table->foreignId('repair_guide_checklist_id')
                ->after('id')
                ->constrained('repair_guide_checklists')
                ->cascadeOnDelete();

            $table->string('video')
                ->after('repair_guide_checklist_id');

            $table->text('caption')
                ->nullable()
                ->after('video');

            $table->unsignedInteger('urutan')
                ->default(1)
                ->after('caption');
        });
    }

    public function down(): void
    {
        Schema::table('repair_guide_videos', function (Blueprint $table) {
            $table->dropForeign(['repair_guide_checklist_id']);

            $table->dropColumn([
                'repair_guide_checklist_id',
                'video',
                'caption',
                'urutan',
            ]);
        });
    }
};
