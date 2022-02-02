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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth', 'checkLevel:1'], function () {
    Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('admin/employee', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('admin.employee');
    Route::get('employee/create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('employee.create');
    Route::post('employee/store', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])->name('employee.store');
    Route::get('employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('employee/update/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'update'])->name('employee.update');
    Route::get('employee/delete/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'destroy'])->name('employee.delete');

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
    Route::post('scorecard/itemcreate', [App\Http\Controllers\Admin\MscorecardController::class, 'storeItem'])->name('scorecard.itemcreate');
    Route::post('scorecard/store', [App\Http\Controllers\Admin\MscorecardController::class, 'store'])->name('scorecard.store');
    Route::get('scorecard/edit/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'edit'])->name('scorecard.edit');
    Route::get('scorecard/show/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'show'])->name('scorecard.show');
    Route::post('scorecard/update/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'update'])->name('scorecard.update');
    Route::get('scorecard/delete/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'destroy'])->name('scorecard.delete');
    Route::get('scorecard/getIdItemScorecard/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'getIdItemScorecard']);
    Route::get('scorecard/additemparameter/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'additemparameter'])->name('scorecard.additemparameter');
    Route::post('scorecard/storeitemparameter', [App\Http\Controllers\Admin\MscorecardController::class, 'storeitemparameter'])->name('scorecard.storeitem');
    Route::get('scorecard/destroyitemparameter/{id}', [App\Http\Controllers\Admin\MscorecardController::class, 'destroyitemparameter'])->name('scorecard.destroyitemparameter');

    Route::get('admin/scorecarditem', [App\Http\Controllers\Admin\Mscorecarditem::class, 'index'])->name('admin.scorecarditem');
    Route::get('scorecarditem/create', [App\Http\Controllers\Admin\Mscorecarditem::class, 'create'])->name('scorecarditem.create');
    Route::post('scorecarditem/store', [App\Http\Controllers\Admin\Mscorecarditem::class, 'store'])->name('scorecarditem.store');
    Route::get('scorecarditem/delete{id}', [App\Http\Controllers\Admin\Mscorecarditem::class, 'destroy'])->name('scorecarditem.delete');
    Route::get('scorecarditem/edit{id}', [App\Http\Controllers\Admin\Mscorecarditem::class, 'edit'])->name('scorecarditem.edit');

    Route::get('scorecarditem/getScoreCardName/{id}', [App\Http\Controllers\Admin\Mscorecarditem::class, 'getScoreCardName']);
    Route::post('scorecarditem/searchItem', [App\Http\Controllers\Admin\Mscorecarditem::class, 'searchItem'])->name('scorecarditem.search');
});

Route::group(['middleware' => 'auth', 'checkLevel:2'], function () {
    Route::get('user/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index']);

    Route::get('monitoring/live', [App\Http\Controllers\LiveController::class, 'index'])->name('monitoring.live');
    Route::get('live/create', [App\Http\Controllers\LiveController::class, 'create'])->name('live.create');

    Route::get('live/edit/{id}', [App\Http\Controllers\LiveController::class, 'edit'])->name('live.edit');
    Route::post('live/update/{id}', [App\Http\Controllers\LiveController::class, 'update'])->name('live.update');
    Route::get('live/delete/{id}', [App\Http\Controllers\LiveController::class, 'destroy'])->name('live.delete');

    Route::get('user/live', [App\Http\Controllers\User\LiveController::class, 'index'])->name('user.live');
    Route::get('live/selectCam/{id}', [App\Http\Controllers\User\LiveController::class, 'selectCam'])->name('live.camselect');
    Route::get('live/startAudit/{mcam}', [App\Http\Controllers\User\LiveController::class, 'startAudit'])->name('live.audit');
    Route::post('live/saveaudit', [App\Http\Controllers\User\LiveController::class, 'saveaudit'])->name('live.saveaudit');
    Route::get('live/find', [App\Http\Controllers\User\LiveController::class, 'find'])->name('find');


    Route::get('user/offline', [App\Http\Controllers\User\OfflineController::class, 'index'])->name('user.offline');
    Route::get('offline/create', [App\Http\Controllers\User\OfflineController::class, 'create'])->name('offline.create');
    Route::post('offline/store', [App\Http\Controllers\User\OfflineController::class, 'store'])->name('offline.store');
    Route::get('offline/edit/{id}', [App\Http\Controllers\User\OfflineController::class, 'edit'])->name('offline.edit');
    Route::post('offline/update/{id}', [App\Http\Controllers\User\OfflineController::class, 'update'])->name('offline.update');
    Route::get('offline/delete/{id}', [App\Http\Controllers\User\OfflineController::class, 'destroy'])->name('offline.delete');
    Route::post('offline/search', [App\Http\Controllers\User\OfflineController::class, 'search'])->name('offline.search');
    Route::get('offline/show/{mcam}', [App\Http\Controllers\User\OfflineController::class, 'show'])->name('offline.show');
    Route::get('offline/search', [App\Http\Controllers\User\OfflineController::class, 'search'])->name('search');
    Route::get('offline/startAudit/{cam}', [App\Http\Controllers\User\OfflineController::class, 'startAudit'])->name('audit');

    Route::get('management/customer', [App\Http\Controllers\User\CustomerServiceController::class, 'index'])->name('management.customer');

    Route::get('management/teller', [App\Http\Controllers\User\TellerServiceController::class, 'index'])->name('management.teller');

    Route::get('management/satpam', [App\Http\Controllers\User\SatpamServiceController::class, 'index'])->name('management.satpam');

    Route::get('user/report', [App\Http\Controllers\User\ReportController::class, 'index'])->name('user.report');

    Route::get('user/score/{cam}', [App\Http\Controllers\User\OfflineController::class, 'score'])->name('user.score');

    Route::get('live/getItemPosition/{id}', [App\Http\Controllers\User\LiveController::class, 'getItemPosition']);
    // Route::get('user/getItemPositionAttitude/{id}', [App\Http\Controllers\User\LiveController::class, 'getItemPositionAttitude']);
    // Route::get('user/getItemPositionAppereance/{id}', [App\Http\Controllers\User\LiveController::class, 'getItemPositionAppereance']);
});

// Route::view('/', 'pages.auth.login');

/* Route For ADMIN*/

/* Route For User */

/*Route::get('offline/getRegion/{id}', [App\Http\Controllers\User\OfflineController::class, 'getRegion']);
Route::get('offline/getOutlet/{id}', [App\Http\Controllers\User\OfflineController::class, 'getOutlet']);

Route::get('offline/getOutlateCam/{id}', [App\Http\Controllers\User\OfflineController::class, 'getOutlateCam']);
 */
Route::get('offline/getDetailCam/{id}', [App\Http\Controllers\User\OfflineController::class, 'getDetailCam']);
Route::get('offline/getDetailCam/{id}', [App\Http\Controllers\User\OfflineController::class, 'getDetailCam']);

Route::get('offline/getItemAspek/{id}', [App\Http\Controllers\User\OfflineController::class, 'dataDetailAspek']);

// Route::get('user/score{link}', function ($link) {
//     return view('user.score', ['link' => $link]);
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
