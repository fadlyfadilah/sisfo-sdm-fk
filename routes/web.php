<?php

use App\Http\Controllers\Admin\BiodataController;
use App\Http\Controllers\Admin\DiklatController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImpasingController;
use App\Http\Controllers\Admin\JafungController;
use App\Http\Controllers\Admin\KepangkatanController;
use App\Http\Controllers\Admin\PendidikanController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RekognisiController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SertifikasiController;
use App\Http\Controllers\Admin\SertifikasiprofController;
use App\Http\Controllers\Admin\StudiController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Permissions
    Route::resource('permissions', PermissionsController::class);

    // Roles
    Route::resource('roles', RolesController::class);

    // Users
    Route::resource('users', UsersController::class);

    // Biodata
    Route::resource('biodata', BiodataController::class);

    // Impassing
    Route::resource('impasings', ImpasingController::class);

    // Jafung
    Route::resource('jafungs', JafungController::class);

    // Kepangkatan
    Route::resource('kepangkatans', KepangkatanController::class);

    // Pendidikan
    Route::resource('pendidikans', PendidikanController::class);

    // Diklat
    Route::resource('diklats', DiklatController::class);

    // Sertifikasi
    Route::resource('sertifikasis', SertifikasiController::class);

    // Sertifikasiprof
    Route::resource('sertifikasiprofs', SertifikasiprofController::class);

    // Studi
    Route::resource('studis', StudiController::class);

    // Rekognisi
    Route::resource('rekognisis', RekognisiController::class);
});
// Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
//     // Change password
//     if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
//         Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
//         Route::post('password', 'ChangePasswordController@update')->name('password.update');
//         Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
//         Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
//     }
// });
// Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');

//     // Permissions
//     Route::resource('permissions', PermissionsController::class);

//     // Roles
//     Route::resource('roles', RolesController::class);

//     // Users
//     Route::resource('users', UsersController::class);

//     // Biodata
//     Route::resource('biodata', BiodataController::class);

//     Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
//     Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
//     Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
//     Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
// });