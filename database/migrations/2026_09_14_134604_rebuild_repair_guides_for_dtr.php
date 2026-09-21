<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('repair_guides', function (Blueprint $table) {
            $table->date('tgl_penyerahan')
                ->nullable()
                ->after('no_mesin');

            $table->date('tgl_perbaikan')
                ->nullable()
                ->after('tgl_penyerahan');

            $table->unsignedInteger('jarak_tempuh')
                ->nullable()
                ->after('tgl_perbaikan');

            $table->longText('catatan_keseluruhan')
                ->nullable()
                ->after('jarak_tempuh');
        });
    }

    public function down(): void
    {
        Schema::table('repair_guides', function (Blueprint $table) {
            $table->dropColumn([
                'tgl_penyerahan',
                'tgl_perbaikan',
                'jarak_tempuh',
                'catatan_keseluruhan',
            ]);
        });
    }
};
