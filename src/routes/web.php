<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route For monitoring Admin*/
Route::get('monitoring/live', [App\Http\Controllers\LiveController::class, 'index'])->name('monitoring.live');
Route::get('live/create', [App\Http\Controllers\LiveController::class, 'create'])->name('live.create');
Route::post('live/store', [App\Http\Controllers\LiveController::class, 'store'])->name('live.store');
Route::get('live/edit/{id}', [App\Http\Controllers\LiveController::class, 'edit'])->name('live.edit');
Route::post('live/update/{id}', [App\Http\Controllers\LiveController::class, 'update'])->name('live.update');
Route::get('live/delete/{id}', [App\Http\Controllers\LiveController::class, 'destroy'])->name('live.delete');

/* Route For ADMIN*/
Route::get('admin/regional', [App\Http\Controllers\Admin\MregionController::class, 'index'])->name('admin.regional');
Route::get('regional/create', [App\Http\Controllers\Admin\MregionController::class, 'create'])->name('regional.create');
Route::post('regional/store', [App\Http\Controllers\Admin\MregionController::class, 'store'])->name('regional.store');
Route::get('regional/edit/{id}', [App\Http\Controllers\Admin\MregionController::class, 'edit'])->name('regional.edit');
Route::post('regional/update/{id}', [App\Http\Controllers\Admin\MregionController::class, 'update'])->name('regional.update');
Route::get('regional/delete/{id}', [App\Http\Controllers\Admin\MregionController::class, 'destroy'])->name('regional.delete');

Route::get('admin/user', [App\Http\Controllers\Admin\MuserController::class, 'index'])->name('admin.user');
Route::get('user/create', [App\Http\Controllers\Admin\MuserController::class, 'create'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\Admin\MuserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\Admin\MuserController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id}', [App\Http\Controllers\Admin\MuserController::class, 'update'])->name('user.update');
Route::get('user/delete/{id}', [App\Http\Controllers\Admin\MuserController::class, 'destroy'])->name('user.delete');

Route::get('admin/branch', [App\Http\Controllers\Admin\MbranchController::class, 'index'])->name('admin.branch');
Route::get('branch/create', [App\Http\Controllers\Admin\MbranchController::class, 'create'])->name('branch.create');
Route::post('branch/store', [App\Http\Controllers\Admin\MbranchController::class, 'store'])->name('branch.store');
Route::get('branch/edit/{id}', [App\Http\Controllers\Admin\MbranchController::class, 'edit'])->name('branch.edit');
Route::post('branch/update/{id}', [App\Http\Controllers\Admin\MbranchController::class, 'update'])->name('branch.update');
Route::get('branch/delete/{id}', [App\Http\Controllers\Admin\MbranchController::class, 'destroy'])->name('branch.delete');

Route::get('admin/outlet', [App\Http\Controllers\Admin\MoutletController::class, 'index'])->name('admin.outlet');
Route::get('outlet/create', [App\Http\Controllers\Admin\MoutletController::class, 'create'])->name('outlet.create');
Route::post('outlet/store', [App\Http\Controllers\Admin\MoutletController::class, 'store'])->name('outlet.store');
Route::get('outlet/edit/{id}', [App\Http\Controllers\Admin\MoutletController::class, 'edit'])->name('outlet.edit');
Route::post('outlet/update/{id}', [App\Http\Controllers\Admin\MoutletController::class, 'update'])->name('outlet.update');
Route::get('outlet/delete/{id}', [App\Http\Controllers\Admin\MoutletController::class, 'destroy'])->name('outlet.delete');

Route::get('admin/cam', [App\Http\Controllers\Admin\CamController::class, 'index'])->name('admin.cam');
Route::get('cam/create', [App\Http\Controllers\Admin\CamController::class, 'create'])->name('cam.create');
Route::post('cam/store', [App\Http\Controllers\Admin\CamController::class, 'store'])->name('cam.store');
Route::get('cam/edit/{id}', [App\Http\Controllers\Admin\CamController::class, 'edit'])->name('cam.edit');
Route::post('cam/update/{id}', [App\Http\Controllers\Admin\CamController::class, 'update'])->name('cam.update');
Route::get('cam/delete/{id}', [App\Http\Controllers\Admin\CamController::class, 'destroy'])->name('cam.delete');

Route::get('admin/aspek', [App\Http\Controllers\Admin\MaspekController::class, 'index'])->name('admin.aspek');
Route::get('aspek/create', [App\Http\Controllers\Admin\MaspekController::class, 'create'])->name('aspek.create');
Route::post('aspek/store', [App\Http\Controllers\Admin\MaspekController::class, 'store'])->name('aspek.store');
Route::get('aspek/edit/{id}', [App\Http\Controllers\Admin\MaspekController::class, 'edit'])->name('aspek.edit');
Route::post('aspek/update/{id}', [App\Http\Controllers\Admin\MaspekController::class, 'update'])->name('aspek.update');
Route::get('aspek/delete/{id}', [App\Http\Controllers\Admin\MaspekController::class, 'destroy'])->name('aspek.delete');

Route::get('admin/bobot', [App\Http\Controllers\Admin\MscoreController::class, 'index'])->name('admin.bobot');
Route::get('bobot/create', [App\Http\Controllers\Admin\MscoreController::class, 'create'])->name('bobot.create');
Route::post('bobot/store', [App\Http\Controllers\Admin\MscoreController::class, 'store'])->name('bobot.store');
Route::get('bobot/edit/{id}', [App\Http\Controllers\Admin\MscoreController::class, 'edit'])->name('bobot.edit');
Route::post('bobot/update/{id}', [App\Http\Controllers\Admin\MscoreController::class, 'update'])->name('bobot.update');
Route::get('bobot/delete/{id}', [App\Http\Controllers\Admin\MscoreController::class, 'destroy'])->name('bobot.delete');

Route::get('admin/scorecard', [App\Http\Controllers\Admin\MscorecardController::class, 'index'])->name('admin.scorecard');
Route::get('scorecard/create', [App\Http\Controllers\Admin\MscorecardController::class, 'create'])->name('scorecard.create');
Route::post('scorecard/store', [App\Http\Controllers\Admin\MscorecardController::class, 'store'])->name('scorecard.store');
Route::get('scorecard/edit/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'edit'])->name('scorecard.edit');
Route::post('scorecard/update/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'update'])->name('scorecard.update');
Route::get('scorecard/delete/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'destroy'])->name('scorecard.delete');

/* Route For User */
Route::get('user/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard');

Route::get('user/offline', [App\Http\Controllers\User\OfflineController::class, 'index'])->name('user.offline');
Route::get('offline/create', [App\Http\Controllers\User\OfflineController::class, 'create'])->name('offline.create');
Route::post('offline/store', [App\Http\Controllers\User\OfflineController::class, 'store'])->name('offline.store');
Route::get('offline/edit/{id}', [App\Http\Controllers\User\OfflineController::class, 'edit'])->name('offline.edit');
Route::post('offline/update/{id}', [App\Http\Controllers\User\OfflineController::class, 'update'])->name('offline.update');
Route::get('offline/delete/{id}', [App\Http\Controllers\User\OfflineController::class, 'destroy'])->name('offline.delete');
Route::post('offline/search', [App\Http\Controllers\User\OfflineController::class, 'search'])->name('offline.search');
Route::get('offline/show/{mcam}', [App\Http\Controllers\User\OfflineController::class, 'show'])->name('offline.show');
Route::get('offline/search', [App\Http\Controllers\User\OfflineController::class, 'search'])->name('search');

/*Route::get('offline/getRegion/{id}', [App\Http\Controllers\User\OfflineController::class, 'getRegion']);
Route::get('offline/getOutlet/{id}', [App\Http\Controllers\User\OfflineController::class, 'getOutlet']);
Route::get('offline/getOutlateCam/{id}', [App\Http\Controllers\User\OfflineController::class, 'getOutlateCam']);
Route::get('offline/getDetailCam/{id}', [App\Http\Controllers\User\OfflineController::class, 'getDetailCam']);
 */