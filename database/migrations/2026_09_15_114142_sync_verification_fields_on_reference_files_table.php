<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reference_files', function (Blueprint $table) {
            if (!Schema::hasColumn('reference_files', 'status')) {
                $table->string('status')
                    ->default('pending')
                    ->after('deskripsi');
            }

            if (!Schema::hasColumn('reference_files', 'uploaded_by')) {
                $table->foreignId('uploaded_by')
                    ->nullable()
                    ->after('status')
                    ->constrained('users')
                    ->nullOnDelete();
            }

            if (!Schema::hasColumn('reference_files', 'verified_by')) {
                $table->foreignId('verified_by')
                    ->nullable()
                    ->after('uploaded_by')
                    ->constrained('users')
                    ->nullOnDelete();
            }

            if (!Schema::hasColumn('reference_files', 'verified_at')) {
                $table->timestamp('verified_at')
                    ->nullable()
                    ->after('verified_by');
            }

            if (!Schema::hasColumn('reference_files', 'rejection_reason')) {
                $table->text('rejection_reason')
                    ->nullable()
                    ->after('verified_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('reference_files', function (Blueprint $table) {

            if (Schema::hasColumn('reference_files', 'uploaded_by')) {
                $table->dropForeign(['uploaded_by']);
            }

            if (Schema::hasColumn('reference_files', 'verified_by')) {
                $table->dropForeign(['verified_by']);
            }

            $columns = [
                'status',
                'uploaded_by',
                'verified_by',
                'verified_at',
                'rejection_reason',
            ];

            $existingColumns = [];

            foreach ($columns as $column) {
                if (Schema::hasColumn('reference_files', $column)) {
                    $existingColumns[] = $column;
                }
            }

            if (!empty($existingColumns)) {
                $table->dropColumn($existingColumns);
            }
        });
    }
};
