<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reference_files', function (Blueprint $table) {
            $table->string('status')
                ->default('pending')
                ->after('deskripsi');

            $table->foreignId('uploaded_by')
                ->nullable()
                ->after('status')
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('verified_by')
                ->nullable()
                ->after('uploaded_by')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')
                ->nullable()
                ->after('verified_by');

            $table->text('rejection_reason')
                ->nullable()
                ->after('verified_at');
        });
    }

    public function down(): void
    {
        Schema::table('reference_files', function (Blueprint $table) {
            $table->dropForeign(['uploaded_by']);
            $table->dropForeign(['verified_by']);

            $table->dropColumn([
                'status',
                'uploaded_by',
                'verified_by',
                'verified_at',
                'rejection_reason',
            ]);
        });
    }
};