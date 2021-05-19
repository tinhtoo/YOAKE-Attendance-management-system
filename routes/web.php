<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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


//login 画面の表示
Route::get('/','App\Http\Controllers\LoginController@index');

//メインメニュー画面の表示
Route::get('/main','App\Http\Controllers\LoginController@main');

/////***** 勤怠管理 *****/////

//出退勤入力（部門別）画面表示
Route::get('work_time/WorkTimeEditor','App\Http\Controllers\HomeController@WorkTimeEditor');

//出退勤入力（部門別）画面表示
Route::get('work_time/WorkTimeDeptEditor','App\Http\Controllers\HomeController@WorkTimeDeptEditor');

//出退勤照会　画面表示
Route::get('work_time/EmpWorkStatusReference','App\Http\Controllers\HomeController@EmpWorkStatusReference');

//勤務状況照会(個人用) 画面表示
Route::get('work_time/WorkTimeReference','App\Http\Controllers\HomeController@WorkTimeReference');

//勤務状況照会(管理者用) 画面表示
Route::get('work_time/EmpWorkTimeReference','App\Http\Controllers\HomeController@EmpWorkTimeReference');