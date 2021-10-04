<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Request;
use App\Models\MT11Login;
use App\Http\Controllers\Work_Time\Session;

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

    public function check(Request $request){
        // //validae Requestフォーム入力値確認が必要為後使う予定があるのでコメントアウトしてます。// //
        // $this->validate($request,[
        //     'txtLoginId' =>'required',
        //     'passward' =>'required'
        // ]);

    /* 画面名->login.blade.php */
    // $loginUser = $request->input('txtLoginId');
    // dd($loginUser);
    $loginUser = MT11Login::WHERE('LOGIN_ID', '=', $request->txtLoginId)->first();
    //dd($loginUser->LOGIN_ID);
    $request->session()->put('id',$loginUser->LOGIN_ID);
    
    //dd(session('id'));
    if($loginUser){
        if($request->password==$loginUser->PASSWORD){
            $request->session()->put('LoggedUser', $loginUser->EMP_CD);
            //成功の時はメインメニュー画面表示
            return redirect('main');
        }else{
            return back();
        }
    }else{
        return back();
    }

    }

    //////***** 勤怠管理 *****//////
    /**
     * メインメニュー画面
     *
     * @return view
     */
    function main()
    {
        return view('menu.main');
    }

}
