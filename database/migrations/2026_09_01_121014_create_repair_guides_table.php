<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repair_guides', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kendaraan');
            $table->string('foto')->nullable();
            $table->text('jenis_keluhan');
            $table->longText('cara_memperbaiki');
            $table->string('video')->nullable();
            $table->string('file_pendukung')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repair_guides');
    }
};
