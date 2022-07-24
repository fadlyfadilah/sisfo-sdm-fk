<?php

use App\Http\Controllers\Admin\BiodataController;
use App\Http\Controllers\Admin\DiklatController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImpasingController;
use App\Http\Controllers\Admin\JafungController;
use App\Http\Controllers\Admin\KepangkatanController;
use App\Http\Controllers\Admin\PendidikanController;
use App\Http\Controllers\Admin\PeningkatanController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RekognisiController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SertifikasiController;
use App\Http\Controllers\Admin\SertifikasiprofController;
use App\Http\Controllers\Admin\StudiController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Frontend\BiodataController as FrontendBiodataController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
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
    Route::get('/export/biodata', [BiodataController::class, 'export']);
    Route::get('/export/biodataAkademik', [BiodataController::class, 'exportDosenAkademik']);
    Route::get('/export/biodataTetap', [BiodataController::class, 'exportDosenTetap']);
    Route::get('/export/biodataTidakTetap', [BiodataController::class, 'exportDosenTidakTetap']);
    Route::get('/export/biodataKontrakYayasan', [BiodataController::class, 'exportDosenKontrakYayasan']);
    Route::get('/export/biodataAmi', [BiodataController::class, 'exportBiodataAmi']);

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
    Route::get('/export/studi', [StudiController::class, 'export']);

    // Rekognisi
    Route::resource('rekognisis', RekognisiController::class);
    Route::get('/export/rekognisi', [RekognisiController::class, 'export']);

    // Peningkatan
    Route::resource('peningkatans', PeningkatanController::class);
    Route::get('/export/peningkatan', [PeningkatanController::class, 'export']);
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
Route::group(['as' => 'frontend.', 'middleware' => ['auth']], function () {
    Route::get('/home', [FrontendHomeController::class, 'index'])->name('home');

    // Biodata
    Route::resource('biodata', FrontendBiodataController::class);
    Route::post('biodata/storekep', [FrontendBiodataController::class, 'storekep'])->name('biodata.storekep');
    Route::post('biodata/storekel', [FrontendBiodataController::class, 'storekel'])->name('biodata.storekel');
    Route::post('biodata/storebid', [FrontendBiodataController::class, 'storebid'])->name('biodata.storebid');
    Route::post('biodata/storeala', [FrontendBiodataController::class, 'storeala'])->name('biodata.storeala');
    Route::post('biodata/storekepe', [FrontendBiodataController::class, 'storekepe'])->name('biodata.storekepe');
    Route::post('biodata/storelain', [FrontendBiodataController::class, 'storelain'])->name('biodata.storelain');
    
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
    Route::get('/export/studi', [StudiController::class, 'export']);

    // Rekognisi
    Route::resource('rekognisis', RekognisiController::class);
    Route::get('/export/rekognisi', [RekognisiController::class, 'export']);

    // Peningkatan
    Route::resource('peningkatans', PeningkatanController::class);
    Route::get('/export/peningkatan', [PeningkatanController::class, 'export']);
    
    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
