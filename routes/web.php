<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ApproverLoginController;
use App\Http\Controllers\ApproverController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\RadiologistLoginController;
use App\Http\Controllers\RadiologistController;
use App\Http\Controllers\PatientLoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlotController;
use App\Http\Middleware\Internal;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('guest.home');

Route::get('/internal', function () {
    return view('internal-home');
});

Route::prefix('radiologist')->group(function () {
    Route::get('/login', [RadiologistLoginController::class, 'login'])->name('radiologist.login');
    Route::post('/login/radiologist', [RadiologistLoginController::class, 'confirm_login'])->name('radiologist.confirm.login');
    Route::post('logout', [RadiologistLoginController::class, 'logout'])->name('radiologist.logout');
    Route::middleware('radiologist')->group(function () {
        Route::get('/index', [RadiologistController::class, 'index'])->name('radiologist.index');
        Route::get('/assignment/index', [RadiologistController::class, 'assignment_index'])->name('radiologist.assignment.index');
        Route::get('assignment/{assignment:id}/served', [RadiologistController::class, 'served'])->name('radiologist.appointment.served');
        Route::get('assignment/{assignment:id}/absent', [RadiologistController::class, 'absent'])->name('radiologist.appointment.absent');
    });
});

Route::prefix('patient')->group(function () {
    Route::get('/register', [PatientLoginController::class, 'register'])->name('patient.register');
    Route::get('/login', [PatientLoginController::class, 'login'])->name('patient.login');
    Route::post('/login/patient', [PatientLoginController::class, 'confirm_login'])->name('patient.confirm.login');
    Route::post('/register/patient', [PatientLoginController::class, 'confirm_register'])->name('patient.confirm.register');
    Route::post('logout', [PatientLoginController::class, 'logout'])->name('patient.logout');
    Route::middleware('patient')->group(function () {
        Route::get('/index', [PatientController::class, 'index'])->name('patient.index');
        Route::post('/logout', [PatientLoginController::class, 'logout'])->name('patient.logout');
        Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
        Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
        Route::get('/appointment/index', [AppointmentController::class, 'patient_index'])->name('patient.appointment.index');
        Route::get('/appointment/{appointment:id}/edit', [AppointmentController::class, 'edit'])->name('patient.appointment.edit');
        Route::patch('/appointment/{appointment:id}', [AppointmentController::class, 'update'])->name('patient.appointment.update');
        Route::get('appointment/{appointment:id}', [AppointmentController::class, 'cancel'])->name('patient.appointment.cancel');
        Route::get('/appointment/{appointment:id}/payment', [AppointmentController::class, 'payment'])->name('patient.appointment.payment');
        Route::patch('/appointment/payments/{appointment:id}', [AppointmentController::class, 'confirm_payment'])->name('patient.appointment.confirm.payment');
    });
});

Route::prefix('internal/admin')->group(function () {
    // Route::get('/register', [AdminLoginController::class, 'register'])->name('admin.register');
    // Route::post('/register/admin', [AdminLoginController::class, 'confirm_register'])->name('admin.confirm.register');
    Route::get('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/login/admin', [AdminLoginController::class, 'confirm_login'])->name('admin.confirm.login');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::middleware('admin')->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        Route::get('/table/admin/index', [AdminController::class, 'admin_index'])->name('admin.admin.index');
        Route::get('/table/admin/create', [AdminController::class, 'admin_create'])->name('admin.admin.create');
        Route::post('/table/admin/create', [AdminController::class, 'admin_store'])->name('admin.admin.store');
        Route::get('/table/admin/{admin:id}/edit', [AdminController::class, 'admin_edit'])->name('admin.admin.edit');
        Route::patch('/table/admins/{admin:id}', [AdminController::class, 'admin_update'])->name('admin.admin.update');
        Route::delete('/table/admins/{admin:id}', [AdminController::class, 'admin_destroy'])->name('admin.admin.destroy');

        Route::get('/table/radiologist/index', [AdminController::class, 'radiologist_index'])->name('admin.radiologist.index');
        Route::get('/table/radiologist/create', [AdminController::class, 'radiologist_create'])->name('admin.radiologist.create');
        Route::post('/table/radiologist/create', [AdminController::class, 'radiologist_store'])->name('admin.radiologist.store');
        Route::get('/table/radiologist/{radiologist:id}/edit', [AdminController::class, 'radiologist_edit'])->name('admin.radiologist.edit');
        Route::patch('/table/radiologists/{radiologist:id}', [AdminController::class, 'radiologist_update'])->name('admin.radiologist.update');
        Route::delete('/table/radiologists/{radiologist:id}', [AdminController::class, 'radiologist_destroy'])->name('admin.radiologist.destroy');

        Route::get('/table/approver/index', [AdminController::class, 'approver_index'])->name('admin.approver.index');
        Route::get('/table/approver/create', [AdminController::class, 'approver_create'])->name('admin.approver.create');
        Route::post('/table/approver/create', [AdminController::class, 'approver_store'])->name('admin.approver.store');
        Route::get('/table/approver/{approver:id}/edit', [AdminController::class, 'approver_edit'])->name('admin.approver.edit');
        Route::patch('/table/approvers/{approver:id}', [AdminController::class, 'approver_update'])->name('admin.approver.update');
        Route::delete('/table/approvers/{approver:id}', [AdminController::class, 'approver_destroy'])->name('admin.approver.destroy');

        Route::get('/table/patient/index', [AdminController::class, 'patient_index'])->name('admin.patient.index');
        Route::delete('/table/patients/{patient:id}', [AdminController::class, 'patient_destroy'])->name('admin.patient.destroy');
    });
});

Route::prefix('internal/approver')->group(function () {
    // Route::get('/register', [ApproverLoginController::class, 'register'])->name('approver.register');
    // Route::post('/register/approver', [ApproverLoginController::class, 'confirm_register'])->name('approver.confirm.register');
    Route::get('/login', [ApproverLoginController::class, 'login'])->name('approver.login');
    Route::post('/login/approver', [ApproverLoginController::class, 'confirm_login'])->name('approver.confirm.login');
    Route::post('logout', [ApproverLoginController::class, 'logout'])->name('approver.logout');
    Route::middleware('approver')->group(function () {
        Route::get('/index', [ApproverController::class, 'index'])->name('approver.index');
        Route::post('/logout', [ApproverLoginController::class, 'logout'])->name('approver.logout');
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::get('/table/patient/index', [ApproverController::class, 'patient_index'])->name('approver.patient.index');
        Route::get('/slots/create', [SlotController::class, 'create'])->name('slots.create');
        Route::get('/slots/index', [SlotController::class, 'index'])->name('slots.index');
        Route::post('/slots', [SlotController::class, 'store'])->name('slots.store');
        Route::get('/slots/{slot:id}', [SlotController::class, 'update'])->name('slots.update');
        Route::get('/appointment/index', [AppointmentController::class, 'approver_appointment'])->name('approver.appointment.index');
        Route::get('appointment/{appointment:id}/decline', [AppointmentController::class, 'decline'])->name('appointment.decline');
        Route::get('appointment/{appointment:id}/confirm', [AppointmentController::class, 'confirm'])->name('appointment.confirm');
        Route::get('appointment/{appointment:id}/assign', [AssignmentController::class, 'create'])->name('appointment.assign');
        Route::post('appointment/{appointment:id}', [AssignmentController::class, 'store'])->name('patient.appointment.assignment');
        Route::get('assignment/index', [AssignmentController::class, 'index'])->name('assignment.index');
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
