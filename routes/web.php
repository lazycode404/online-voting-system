<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/submit',[App\Http\Controllers\HomeController::class, 'submit'])->name('submit.vote');
Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');
Route::get('/candidate/platform/{id}',[App\Http\Controllers\HomeController::class, 'showplatform'])->name('candidate.platform');

Route::group(['prefix' => 'admin'], function() {
	Route::group(['middleware' => 'admin.guest'], function(){
		Route::view('/login','admin.login')->name('admin.login');
		Route::post('/login',[App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.auth');
	});

	Route::group(['middleware' => 'admin.auth'], function(){
        //DASHBOARD
		Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard');

        //ADMINISTRATION ACCOUNT
        Route::get('accounts/view',[App\Http\Controllers\Admin\AccountController::class, 'index']);
        Route::get('accounts/create',[App\Http\Controllers\Admin\AccountController::class, 'create']);
        Route::post('accounts/submit',[App\Http\Controllers\Admin\AccountController::class, 'submit'])->name('admin.accounts.submit');
        Route::get('accounts/edit/{id}',[App\Http\Controllers\Admin\AccountController::class,'edit']);
        Route::post('accounts/update',[App\Http\Controllers\Admin\AccountController::class,'update'])->name('admin.accounts.update');

        //ELECTION LIST
        Route::get('election/view',[App\Http\Controllers\Admin\ElectionController::class,'index']);
        Route::get('election/create',[App\Http\Controllers\Admin\ElectionController::class,'create']);
        Route::post('election/submit',[App\Http\Controllers\Admin\ElectionController::class,'submit'])->name('admin.election.submit');
        Route::get('election/edit/{id}',[App\Http\Controllers\Admin\ElectionController::class,'edit']);
        Route::post('election/update',[\App\Http\Controllers\Admin\ElectionController::class, 'update'])->name('admin.election.update');
        Route::post('election/start',[App\Http\Controllers\Admin\ElectionController::class, 'start'])->name('admin.election.start');
        Route::post('election/stop',[App\Http\Controllers\Admin\ElectionController::class, 'stop'])->name('admin.election.stop');

        //POSITION
        Route::get('position/view',[App\Http\Controllers\Admin\PositionController::class, 'index']);
        Route::get('position/create',[App\Http\Controllers\Admin\PositionController::class, 'create']);
        Route::post('position/submit',[App\Http\Controllers\Admin\PositionController::class, 'submit'])->name('admin.position.submit');
        Route::get('position/edit/{id}',[App\Http\Controllers\Admin\PositionController::class, 'edit']);
        Route::post('position/update',[\App\Http\Controllers\Admin\PositionController::class, 'update'])->name('admin.position.update');
        Route::post('position/delete',[App\Http\Controllers\Admin\PositionController::class, 'delete'])->name('admin.position.delete');
        Route::post('position/disable',[App\Http\Controllers\Admin\PositionController::class, 'disable'])->name('admin.position.disable');
        Route::post('position/enable',[App\Http\Controllers\Admin\PositionController::class, 'enable'])->name('admin.position.enable');

        //CANDIDATE
        Route::get('candidate/view',[App\Http\Controllers\Admin\CandidateController::class, 'index']);
        Route::get('candidate/create',[App\Http\Controllers\Admin\CandidateController::class, 'create']);
        Route::post('candidate/submit',[App\Http\Controllers\Admin\CandidateController::class, 'submit'])->name('admin.candidate.submit');
        Route::get('candidate/platform/{id}',[App\Http\Controllers\Admin\CandidateController::class, 'showplatform'])->name('admin.candidate.platform');
        Route::get('candidate/edit/{id}',[App\Http\Controllers\Admin\CandidateController::class, 'edit']);
        Route::post('candidate/update',[App\Http\Controllers\Admin\CandidateController::class, 'update'])->name('admin.candidate.update');

        //VOTER
        Route::get('voter/view',[App\Http\Controllers\Admin\VoterController::class, 'index']);
        Route::get('voter/create',[App\Http\Controllers\Admin\VoterController::class, 'create']);
        Route::post('voter/submit',[App\Http\Controllers\Admin\VoterController::class,'submit'])->name('admin.voter.submit');

        //SETTINGS
        Route::get('settings',[App\Http\Controllers\Admin\SettingsController::class,'index']);
        Route::post('settings/password/update',[App\Http\Controllers\Admin\SettingsController::class,'updatePassword'])->name('admin.settings.password');
        Route::post('settings/sms/submit',[App\Http\Controllers\Admin\SettingsController::class,'submitsms'])->name('admin.settings.submitsms');

        //VOTES
        Route::get('votes',[App\Http\Controllers\Admin\VotesController::class,'index']);


        //LOGOUT
        Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
	});
});
