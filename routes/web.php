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
use App\Http\Controllers\Frontend\DiklatController as FrontendDiklatController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\ImpasingController as FrontendImpasingController;
use App\Http\Controllers\Frontend\JafungController as FrontendJafungController;
use App\Http\Controllers\Frontend\KepangkatanController as FrontendKepangkatanController;
use App\Http\Controllers\Frontend\PendidikanController as FrontendPendidikanController;
use App\Http\Controllers\Frontend\PeningkatanController as FrontendPeningkatanController;
use App\Http\Controllers\Frontend\RekognisiController as FrontendRekognisiController;
use App\Http\Controllers\Frontend\SertifikasiController as FrontendSertifikasiController;
use App\Http\Controllers\Frontend\SertifikasiprofController as FrontendSertifikasiprofController;
use App\Http\Controllers\Frontend\StudiController as FrontendStudiController;
use App\Http\Controllers\TahunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::post('/tahun', [TahunController::class, 'index'])->name('tahun');
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
    Route::resource('impasings', FrontendImpasingController::class);

    // Jafung
    Route::resource('jafungs', FrontendJafungController::class);

    // Kepangkatan
    Route::resource('kepangkatans', FrontendKepangkatanController::class);

    // Pendidikan
    Route::resource('pendidikans', FrontendPendidikanController::class);

    // Diklat
    Route::resource('diklats', FrontendDiklatController::class);

    // Sertifikasi
    Route::resource('sertifikasis', FrontendSertifikasiController::class);

    // Sertifikasiprof
    Route::resource('sertifikasiprofs', FrontendSertifikasiprofController::class);

    // Studi
    Route::resource('studis', FrontendStudiController::class);

    // Rekognisi
    Route::resource('rekognisis', FrontendRekognisiController::class);

    // Peningkatan
    Route::resource('peningkatans', FrontendPeningkatanController::class);
    
    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
