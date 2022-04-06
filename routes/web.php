<?php

use App\Http\Controllers\Work_Time\WorkTimeEditorController;
use App\Http\Controllers\Work_Time\EmpWorkTimeReferenceController;
use App\Http\Controllers\Work_Time\WorkTimeDeptEditorController;

use App\Http\Controllers\Search\MT10EmpSearchController;
use App\Http\Controllers\Search\MT12DeptSearchController;

use App\Http\Controllers\Master\MT11LoginRefController;

use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\TestController;
use App\Http\Controllers\TestController;
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
// Route::get('/test/index',[TestController::class,'dll']);

/**Routeの設定をしました。 */

Auth::routes();

//ログイン画面表示
// Route::get('/','App\Http\Controllers\UserAuthController@login');
Route::group(['middleware' => 'AlreadyLoggedIn'],function(){
    //start_16
// Route::get('/',[UserAuthController::class,'login'])->name('login');
Route::get('/',[UserAuthController::class,'login']);
// Route::post('check',[UserAuthController::class,'check'])->name('auth.check');
Route::post('check',[UserAuthController::class,'loginCheck'])->name('auth.check');
    //end_16

// Route::get('/test/index', );    

// Route::get('/test/index',[TestController::class,'dll']);
});

//メインメニュー画面の表示
//Route::get('main',[UserAuthController::class, 'main']);
Route::group(['middleware' => 'islogged'],function(){

    Route::get('/test/index',[TestController::class,'dll']);
    Route::post('/test/index',[TestController::class,'dll']);

    Auth::routes();
    Route::get('main',[UserAuthController::class, 'main'])->name('main');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout.form');
    //Route::get('/', [UserAuthController::class, 'logout'])->name('logout.perform');


/////***** 勤怠管理 *****/////

//出退勤入力（部門別）画面表示
//Route::get('/work_time/WorkTimeEditor',[WorkTimeEditorController::class, 'WorkTimeEditor']) ->name('WorkTimeEditor');

//出退勤入力 (post) 

Route::get('/work_time/WorkTimeEditor',[WorkTimeEditorController::class, 'worktimeeditor']) ->name('worktimeeditor');
Route::post('/work_time/WorkTimeEditor',[WorkTimeEditorController::class, 'search']) ->name('wte.search');
//Route::match(['get', 'post'], '/work_time/WorkTimeEditorEdit',[WorkTimeEditorController::class, 'edit']) ->name('wte.edit');
Route::post('/work_time/WorkTimeEditorEdit',[WorkTimeEditorController::class, 'edit']) ->name('wte.edit');
Route::post('/work_time/WorkTimeEditorUpdate',[WorkTimeEditorController::class, 'update']) ->name('wte.update');
Route::post('/work_time/WorkTimeEditorCancel',[WorkTimeEditorController::class, 'cancel']) ->name('wte.cancel');



//出退勤入力（部門別）画面表示
//Route::get('work_time/WorkTimeDeptEditor','App\Http\Controllers\HomeController@WorkTimeDeptEditor');
Route::get('/work_time/WorkTimeDeptEditor',[WorkTimeDeptEditorController::class, 'WorkTimeDeptEditor']) ->name('wtdepteditor');
Route::post('/work_time/WorkTimeDeptEditor',[WorkTimeDeptEditorController::class, 'search']) ->name('wtde.search');
Route::post('/work_time/WorkTimeDeptEditorEdit',[WorkTimeDeptEditorController::class, 'edit']) ->name('wtde.edit');
//Route::get('/work_time/WorkTimeDeptEditorEdit',[WorkTimeDeptEditorController::class, 'edit']) ->name('wtde.edit');
Route::post('/work_time/WorkTimeDeptEditorUpdate',[WorkTimeDeptEditorController::class, 'update']) ->name('wtde.update');
Route::post('/work_time/WorkTimeDeptEditorCancel',[WorkTimeDeptEditorController::class, 'cancel']) ->name('wtde.cancel');

//出退勤照会　画面表示
Route::get('work_time/EmpWorkStatusReference','App\Http\Controllers\HomeController@EmpWorkStatusReference');

//勤務状況照会(個人用) 画面表示
Route::get('work_time/WorkTimeReference','App\Http\Controllers\HomeController@WorkTimeReference');

//勤務状況照会(管理者用) 画面表示
//Route::get('work_time/EmpWorkTimeReference','App\Http\Controllers\HomeController@EmpWorkTimeReference');
Route::get('/work_time/EmpWorkTimeReference',[EmpWorkTimeReferenceController::class, 'empworktime_ref']) ->name('empworktime_ref');
Route::post('/work_time/EmpWorkTimeReference',[EmpWorkTimeReferenceController::class, 'search']) ->name('ewtr.search');
Route::post('/work_time/EmpWorkTimeReferenceCancel',[EmpWorkTimeReferenceController::class, 'cancel']) ->name('ewtr.cancel');

/////***** 帳票 *****/////

//勤務予定表(週・月別) 画面表示
Route::get('form_print/WorkPlanPrint','App\Http\Controllers\HomeController@WorkPlanPrint');

//勤務実績表(日・週・月別) 画面表示
Route::get('form_print/WorkTimePrint','App\Http\Controllers\HomeController@WorkTimePrint');

//未打刻／二重打刻一覧表  画面表示
Route::get('form_print/TimeStampPrint','App\Http\Controllers\HomeController@TimeStampPrint');

//事由／勤怠一覧表 画面表示
Route::get('form_print/ReasonWorkPtnPrint','App\Http\Controllers\HomeController@ReasonWorkPtnPrint');

//残業申請書 画面表示
Route::get('form_print/OvertimeAplPrint','App\Http\Controllers\HomeController@OvertimeAplPrint');


/////***** シフト管理 *****/////

//シフトパターン情報入力 画面表示
Route::get('shift/MT04ShiftPtnReference','App\Http\Controllers\HomeController@MT04ShiftPtnReference');

//シフトパターン情報入力(新規シフトパタン登録) 画面表示
Route::get('shift/MT04ShiftPtnEditor','App\Http\Controllers\HomeController@MT04ShiftPtnEditor');

//月別シフト入力  画面表示
Route::get('shift/MonthShiftEditor','App\Http\Controllers\HomeController@MonthShiftEditor');

//社員別月別シフト入力 画面表示
Route::get('shift/MonthShiftEmpEditor','App\Http\Controllers\HomeController@MonthShiftEmpEditor');



/////***** 管理業務 *****/////

//カレンダー情報入力画面表示
Route::get('mng_oprt/MT03CalendarEditor','App\Http\Controllers\HomeController@MT03CalendarEditor');

//シフト月次更新処理画面表示
Route::get('mng_oprt/ShiftCalendarCarryOver','App\Http\Controllers\HomeController@ShiftCalendarCarryOver');

//月次確定処理画面表示
Route::get('mng_oprt/WorkTimeFix','App\Http\Controllers\HomeController@ShiftCalendarCarryOver');

//月次確定状況照会画面
Route::get('mng_oprt/WorkTimeFixReference','App\Http\Controllers\HomeController@WorkTimeFixReference');

//最新打刻情報取得処理画面
Route::get('mng_oprt/WorkTimeConvert','App\Http\Controllers\HomeController@WorkTimeConvert');

//出退勤情報クリア処理画面表示
Route::get('mng_oprt/WorkTimeClear','App\Http\Controllers\HomeController@WorkTimeClear');

//カレンダー情報クリア処理画面表示
Route::get('mng_oprt/CalendarClear','App\Http\Controllers\HomeController@CalendarClear');

//勤務実績情報出力画面
Route::get('mng_oprt/WorkTimeExport','App\Http\Controllers\HomeController@WorkTimeExport');


/////***** マスタ *****/////

//社員情報照会
Route::get('master/MT10EmpReference','App\Http\Controllers\HomeController@MT10EmpReference');

//社員情報入力
Route::get('master/MT10EmpEditor','App\Http\Controllers\HomeController@MT10EmpEditor');

//ログイン情報入力
//Route::get('master/MT11LoginReference','App\Http\Controllers\HomeController@MT11LoginReference');
Route::get('master/MT11LoginReference',[MT11LoginRefController::class, 'search']) ->name('MT11LoginRef.search');
Route::get('master/MT11LoginEditor/{id}',[MT11LoginRefController::class, 'edit']) ->name('MT11LoginEdit.edit');
Route::post('master/MT11LoginEditor/{id}',[MT11LoginRefController::class, 'update']) ->name('MT11LoginEdit.update');

//ログイン情報照会
Route::get('master/MT11LoginEditor','App\Http\Controllers\HomeController@MT11LoginEditor');

//パスワード変更入力
Route::get('master/MT11PasswordEditor','App\Http\Controllers\HomeController@MT11PasswordEditor');

//機能権限情報照会
Route::get('master/MT14PGAuthReference','App\Http\Controllers\HomeController@MT14PGAuthReference');

//機能権限情報入力
Route::get('master/MT14PGAuthEditor','App\Http\Controllers\HomeController@MT14PGAuthEditor');

//部門情報照会
Route::get('master/MT12DeptReference','App\Http\Controllers\HomeController@MT12DeptReference');

//部門情報照会
Route::get('master/MT12DeptEditor','App\Http\Controllers\HomeController@MT12DeptEditor');

//部門情報照会_test*********
Route::get('master/table_add_test','App\Http\Controllers\HomeController@table_add_test');

//組織変更照会
Route::get('master/MT12OrgReference','App\Http\Controllers\HomeController@MT12OrgReference');

//組織変更入力
Route::get('master/MT12OrgEditor','App\Http\Controllers\HomeController@MT12OrgEditor');

//部門情報検索（UpDeptSearch）
Route::get('master/UpDeptSearch','App\Http\Controllers\HomeController@UpDeptSearch');

//部門権限情報照会
Route::get('master/MT13DeptAuthReference','App\Http\Controllers\HomeController@MT13DeptAuthReference');

//部門権限情報入力
Route::get('master/MT13DeptAuthEditor','App\Http\Controllers\HomeController@MT13DeptAuthEditor');

//祝祭日・会社休日情報入力
Route::get('master/MT08HolidayEditor','App\Http\Controllers\HomeController@MT08HolidayEditor');

//勤務体系情報照会
Route::get('master/MT05WorkPtnReference','App\Http\Controllers\HomeController@MT05WorkPtnReference');

//勤務体系情報入力
Route::get('master/MT05WorkPtnEditor','App\Http\Controllers\HomeController@MT05WorkPtnEditor');

//端数処理情報入力
Route::get('master/MT07FractionEditor','App\Http\Controllers\HomeController@MT07FractionEditor');

//カレンダーパターン情報照会
Route::get('master/MT02CalendarPtnReference','App\Http\Controllers\HomeController@MT02CalendarPtnReference');

//カレンダーパターン情報入力
Route::get('master/MT02CalendarPtnEditor','App\Http\Controllers\HomeController@MT02CalendarPtnEditor');

//未実施*******未実装

//残業上限情報入力
Route::get('master/MT06OverTmLmtEditor','App\Http\Controllers\HomeController@MT06OverTmLmtEditor');

//基本情報入力
Route::get('master/MT01ControlEditor','App\Http\Controllers\HomeController@MT01ControlEditor');

//有休情報照会
Route::get('master/MT17PdHolidayReference','App\Http\Controllers\HomeController@MT17PdHolidayReference');

//有休情報入力
Route::get('master/MT17PdHolidayEditor','App\Http\Controllers\HomeController@MT17PdHolidayEditor');

//社員番号一括変換
Route::get('master/MT10EmpCnvert','App\Http\Controllers\HomeController@MT10EmpCnvert');

//社員情報書出処理
Route::get('master/EmpExport','App\Http\Controllers\HomeController@EmpExport');

//社員情報取込処理 
Route::get('master/EmpImport','App\Http\Controllers\HomeController@EmpImport');

//所属情報照会 
Route::get('master/MT23CompanyReference','App\Http\Controllers\HomeController@MT23CompanyReference');

//所属情報入力
Route::get('master/MT23CompanyEditor','App\Http\Controllers\HomeController@MT23CompanyEditor'); 
});

//***** sub-画面処理*****//

//部門情報検索（MT12DeptSearch）
Route::get('search/MT12DeptSearch',[MT12DeptSearchController::class, 'search']) ->name('dep.search');

//社員情報検索（MT10EmpSearch）
// Route::get('/search/MT10EmpSearch',[MT10EmpSearchController::class, 'index']) ->name('index');
Route::get('/search/MT10EmpSearch',[MT10EmpSearchController::class, 'search']) ->name('emp.search');



