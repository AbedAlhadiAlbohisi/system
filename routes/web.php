<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\EmailVeificationcontroller;
use App\Http\Controllers\Auth\ResetPasswordcontroller;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Dashbordcontroller;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\permissioncontroller;
use App\Http\Controllers\Rolecontroller;
use App\Http\Controllers\SickController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\Usercontroller;
use App\Http\Middleware\Agechickemiddleware;
use App\Jobs\testjob;
use App\Mail\AdminWelcomeEmail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/test', 'cms.indext');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::prefix('paramedic')->group(function () {
            Route::view('/', 'moderna.index')->name('Paramedic.home');
            route::view('Website developers', 'moderna.about')->name('Paramedic.about');
            route::view('First Aid', 'moderna.services')->name('Paramedic.services');
        });

        Route::prefix('cms')->middleware('guest:user,admin')->group(function () {
            Route::get('/{guard}/login', [Authcontroller::class, 'showLoginView'])->name('login');
            Route::post('/login', [Authcontroller::class, 'login']);
            // Route::get('users/create', [Usercontroller::class, 'create'])->name('createuser');

            Route::get('forgot-password', [ResetPasswordcontroller::class, 'showForgotpassword'])->name('password.forgot');
            Route::post('forgot-password', [ResetPasswordcontroller::class, 'sendRestLink']);

            Route::get('reset-password/{token}', [ResetPasswordcontroller::class, 'shoewResetPassword'])->name('password.reset');
            Route::post('reset-password', [ResetPasswordcontroller::class, 'resetPassword']);
        });

        Route::prefix('cms/admin')->middleware(['auth:admin,user', 'verified'])->group(function () {
            Route::resource('admins', AdminController::class);
            Route::resource('roles', Rolecontroller::class);
            Route::resource('permissions', permissioncontroller::class);
        });

        Route::prefix('cms/admin')->middleware(['auth:admin,user', 'verified'])->group(function () {
            Route::post('roles/permissions', [Rolecontroller::class, 'updateRolePermission']);
            Route::get('user/{user}/permissions/edit', [Usercontroller::class, 'edituserpermission'])->name('user.edit-permissions');
            Route::put('user/{user}/permissions', [Usercontroller::class, 'updateuserpermission'])->name('user.ubdate-permissions');
        });

        Route::prefix('cms/admin')->middleware(['auth:user,admin', 'verified'])->group(function () {
            Route::get('/', [Dashbordcontroller::class, 'showDashbord'])->name('cms.dashpard');
            Route::resource('cities', CityController::class);
            Route::resource('users', Usercontroller::class);
            Route::resource('sick', SickController::class);
            Route::resource('category', CategoryController::class);
            Route::resource('sub-categories', SubCategoryController::class);
            Route::resource('notes', NoteController::class);

            Route::get('notifications', [NotificationController::class, 'index'])->name('user.notification');
            Route::get('edit-password', [Authcontroller::class, 'editPassword'])->name('edit-password');
            Route::post('update-password', [Authcontroller::class, 'updatePassword'])->name('auth.update-password');
            Route::get('logout', [Authcontroller::class, 'logout'])->name('logout');
        });

        Route::prefix('cms')->middleware('auth:admin,user')->group(function () {
            Route::get('email-verify', [EmailVeificationcontroller::class, 'showEmailverification'])->name('verification.notice');
            Route::get('email-verify/send', [EmailVeificationcontroller::class, 'sendVerificationEmail'])->middleware('throttle:1,1');
            Route::get('verfy/{id}/{hash}', [EmailVeificationcontroller::class, 'verfyEmail'])->middleware('signed')->name('verification.verify');
        });
    }
);




Route::get('test-job', function () {
    // (new testjob())->handle();
    // (new testjob())->dispatch();
    // (new testjob())->dispatch()->delay(5);
    // foreach (range(1, 10) as $i) {
    //     if ($i % 2) {
    //         testjob::dispatch()->onQueue('Even');
    //     } else {
    //         testjob::dispatch()->onQueue('Odd');
    //     }
    // }
    testjob::dispatch();
});

// Route::get('test-email', function () {
//     return new AdminWelcomeEmail(Admin::first());
// });
