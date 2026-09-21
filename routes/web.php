<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;


// Super Admin
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\Auth\SuperAdminLoginController;
use App\Http\Controllers\SuperAdmin\UserManagementController;
use App\Http\Controllers\SuperAdmin\RepairGuideVerificationController;
use App\Http\Controllers\SuperAdmin\ReferenceFileVerificationController;
// Admin
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\RepairGuideController;
use App\Http\Controllers\Admin\ReferenceFileController;
use App\Http\Controllers\Admin\TechnicianController;

// Teknisi
use App\Http\Controllers\Technician\Auth\TechnicianLoginController;
use App\Http\Controllers\Technician\TechnicianDashboardController;
use App\Http\Controllers\Technician\ReferenceFileController as TechnicianReferenceFileController;
use App\Http\Controllers\Technician\RepairGuideController as TechnicianRepairGuideController;




/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Dashboard Umum
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'super_admin') {
        return redirect()->route('super_admin.dashboard');
    }

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'teknisi') {
        return redirect()->route('teknisi.dashboard');
    }

    abort(403);
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Login Admin
|--------------------------------------------------------------------------
*/

Route::get('/login/admin', [AdminLoginController::class, 'create'])
    ->name('admin.login');

Route::post('/login/admin', [AdminLoginController::class, 'store'])
    ->name('admin.login.store');


/*
|--------------------------------------------------------------------------
| Login Teknisi
|--------------------------------------------------------------------------
*/

Route::get('/login/teknisi', [TechnicianLoginController::class, 'create'])
    ->name('teknisi.login');

Route::post('/login/teknisi', [TechnicianLoginController::class, 'store'])
    ->name('teknisi.login.store');





/*
|--------------------------------------------------------------------------
| Login Super Admin
|--------------------------------------------------------------------------
*/

Route::get('/login/super-admin', [SuperAdminLoginController::class, 'create'])
    ->name('super_admin.login');

Route::post('/login/super-admin', [SuperAdminLoginController::class, 'store'])
    ->name('super_admin.login.store');

/*
|--------------------------------------------------------------------------
| SUPER ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'super_admin'])
    ->prefix('super-admin')
    ->name('super_admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])
            ->name('dashboard');

        // ManagementUser
        Route::resource('users', UserManagementController::class)
            ->except(['show']);


        // Verification
        Route::get('/repair-guides', [
            RepairGuideVerificationController::class,
            'index'
        ])->name('repair-guides.index');

        Route::get('/repair-guides/{repairGuide}', [
            RepairGuideVerificationController::class,
            'show'
        ])->name('repair-guides.show');

        Route::patch('/repair-guides/{repairGuide}/approve', [
            RepairGuideVerificationController::class,
            'approve'
        ])->name('repair-guides.approve');

        Route::patch('/repair-guides/{repairGuide}/reject', [
            RepairGuideVerificationController::class,
            'reject'
        ])->name('repair-guides.reject');


        // Verifikasi File Referensi
        Route::get('/reference-files', [ReferenceFileVerificationController::class, 'index'])
            ->name('reference-files.index');

        Route::get('/reference-files/{referenceFile}', [ReferenceFileVerificationController::class, 'show'])
            ->name('reference-files.show');

        Route::get('/reference-files/{referenceFile}/download', [ReferenceFileVerificationController::class, 'download'])
            ->name('reference-files.download');

        Route::patch('/reference-files/{referenceFile}/approve', [ReferenceFileVerificationController::class, 'approve'])
            ->name('reference-files.approve');

        Route::patch('/reference-files/{referenceFile}/reject', [ReferenceFileVerificationController::class, 'reject'])
            ->name('reference-files.reject');
    });



/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Panduan Perbaikan
        Route::resource('repair-guides', RepairGuideController::class);

        // File Referensi
        Route::resource('reference-files', ReferenceFileController::class);

        // Daftar Teknisi
        Route::resource('technicians', TechnicianController::class);
    });


/*
|--------------------------------------------------------------------------
| TEKNISI
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'teknisi'])
    ->prefix('teknisi')
    ->name('teknisi.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [TechnicianDashboardController::class, 'index'])
            ->name('dashboard');


        // Panduan Perbaikan
        Route::get('/repair-guides', [TechnicianRepairGuideController::class, 'index'])
            ->name('repair-guides.index');

        Route::get('/repair-guides/{repairGuide}', [TechnicianRepairGuideController::class, 'show'])
            ->name('repair-guides.show');

        Route::get('/repair-guides/{repairGuide}/videos/{video}/download', [TechnicianRepairGuideController::class, 'downloadVideo'])
            ->name('repair-guides.videos.download');

        Route::get('/repair-guides/{repairGuide}/pdf', [TechnicianRepairGuideController::class, 'pdf'])
            ->name('repair-guides.pdf');

        // File Referensi
        Route::get('/reference-files', [TechnicianReferenceFileController::class, 'index'])
            ->name('reference-files.index');

        Route::get('/reference-files/{referenceFile}/download', [TechnicianReferenceFileController::class, 'download'])
            ->name('reference-files.download');
    });


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
