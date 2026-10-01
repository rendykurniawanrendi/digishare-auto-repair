<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('repair_guides', function (Blueprint $table) {
            // Hapus field lama
            $table->dropColumn([
                'jenis_kendaraan',
                'foto',
                'jenis_keluhan',
                'cara_memperbaiki',
                'video',
                'file_pendukung',
            ]);

            // Informasi DTR
            $table->string('nama_dealer')->after('id');
            $table->string('judul_dtr')->after('nama_dealer');

            // Data kendaraan
            $table->string('no_polisi')->after('judul_dtr');
            $table->string('model')->after('no_polisi');
            $table->string('kode_model')->after('model');
            $table->year('tahun_pembuatan')->after('kode_model');
            $table->string('no_rangka')->after('tahun_pembuatan');
            $table->string('no_mesin')->after('no_rangka');
            $table->date('tgl_penyerahan')->after('no_mesin');
            $table->date('tgl_perbaikan')->after('tgl_penyerahan');
            $table->unsignedInteger('jarak_tempuh')->after('tgl_perbaikan');
        });
    }

    public function down(): void
    {
        Schema::table('repair_guides', function (Blueprint $table) {
            // Hapus field baru
            $table->dropColumn([
                'nama_dealer',
                'judul_dtr',
                'no_polisi',
                'model',
                'kode_model',
                'tahun_pembuatan',
                'no_rangka',
                'no_mesin',
                'tgl_penyerahan',
                'tgl_perbaikan',
                'jarak_tempuh',
            ]);

            // Kembalikan field lama
            $table->string('jenis_kendaraan');
            $table->string('foto')->nullable();
            $table->text('jenis_keluhan');
            $table->longText('cara_memperbaiki');
            $table->string('video')->nullable();
            $table->string('file_pendukung')->nullable();
        });
    }
};