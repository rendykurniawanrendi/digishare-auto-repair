<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repair_guide_videos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('repair_guide_checklist_id')
                ->constrained('repair_guide_checklists')
                ->cascadeOnDelete();

            $table->string('video');

            $table->text('caption')->nullable();

            $table->unsignedInteger('urutan')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repair_guide_videos');
    }
};