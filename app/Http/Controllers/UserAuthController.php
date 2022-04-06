<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Request;
use App\Models\MT11Login;
use App\Models\MT10Emp;
//use App\Http\Controllers\Work_Time\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    //////***** 勤怠管理 *****//////
    /**
     * ログイン画面処理
     *
     * @return view
     */
    public function login()
    {
        return view('auth.login');
    }

    // public function check(Request $request){
    //     // //validae Requestフォーム入力値確認が必要為後使う予定があるのでコメントアウトしてます。// //
    //     // $this->validate($request,[
    //     //     'txtLoginId' =>'required',
    //     //     'passward' =>'required'
    //     // ]);

    // /* 画面名->login.blade.php */
    // // $loginUser = $request->input('txtLoginId');
    // // dd($loginUser);
    // $loginUser = MT11Login::WHERE('LOGIN_ID', '=', $request->txtLoginId)->first();
    // //dd($loginUser->LOGIN_ID);
    // //$request->session()->put('id',$loginUser->LOGIN_ID);
    
    // //dd(session('id'));
    // if($loginUser){
    //     if($request->password==$loginUser->PASSWORD){
    //         //$request->session()->put('LoggedUser', $loginUser->EMP_CD);
    //         $request->session()->put('id', $loginUser->LOGIN_ID);
    //         //成功の時はメインメニュー画面表示
    //         return redirect('main');
    //     }else{
    //         return back();
    //     }
    // }else{
    //     return back();
    // }

    // }

    /**
     * ログアウトユーザ検証チェック
     *
     * @param Request $request
     * @return void
     */
    public function loginCheck(Request $request){
        //検証チェック

        //ログインId の取得
        $loginId = $request->txtLoginId;
        $loginPw = $request->password;
        $loginUser = MT11Login::WHERE('LOGIN_ID', $loginId)->first();
        // $loginName = MT10Emp::WHERE('EMP_CD', $loginUser->EMP_CD)->first();
        //dd($loginName);
        if($loginUser){
            //dd($loginUser->PASSWORD);
            //dd(Hash::check($loginPw, $loginUser->PASSWORD));
            // if(Hash::check($request->password, $loginUser->PASSWORD)){
            if($request->password == $loginUser->PASSWORD){
                 
                $request->session()->put('id', $loginUser->LOGIN_ID);
                
                return redirect('main');
            }else{
                return back()->with('fail','ログインIDまたは、パスワードに誤りがあります。');
            }
        }else{
            return back()->with('fail','ログインIDまたは、パスワードに誤りがあります。');
        }
    }

    //////***** 勤怠管理 *****//////
    /**
     * メインメニュー画面
     *
     * @return view
     */
    function main(Request $request)
    {
        $loginId = session()->get('id');
        $loginUser = MT11Login::WHERE('LOGIN_ID', $loginId)->pluck('EMP_CD');
        $loginName = MT10Emp::WHERE('EMP_CD', $loginUser)->pluck('EMP_NAME');
        $request->session()->put('name', $loginName[0]);
        //dd($loginName);
        //dd(session('name'));
        return view('menu.main');
    }

    /**
     * ログアウト処理
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request) 
    {
        
        Session::flush();
        
        //Auth::logout();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        //return redirect('/');
        return redirect()->route('login');;
    }
    

}
