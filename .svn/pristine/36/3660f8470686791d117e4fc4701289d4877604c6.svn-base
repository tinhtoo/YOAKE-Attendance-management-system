<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\Search\MT12DeptSearchRepository;
use App\Repositories\MT13DeptAuthRepository;
use App\Models\MT99Msg;
use Illuminate\Http\Request;

class MT12DeptSearchController extends Controller
{
    /*
     * リポジトリの実装
     */
    protected $mt10_emp_ref_repository;
    protected $dep_repository;
    protected $mt13_dept_auth_repository;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  UserRepository  $dep_Repository
     * @return void
     */
    public function __construct(
        MT10EmpRefRepository $mt10_emp_ref_repository,
        MT12DeptSearchRepository $dep_Repository,
        MT13DeptAuthRepository $mt13_dept_auth_repository
    ) {
        $this->mt10_emp_ref_repository = $mt10_emp_ref_repository;
        $this->dep_repository = $dep_Repository;
        $this->mt13_dept_auth_repository = $mt13_dept_auth_repository;
    }

    /**
     * 部門の一覧選択画面を表示する
     * @return 部門選択画面
     */
    public function search(Request $request)
    {
        $login_id = session('id');
        $request_data = $request->all();
        $disp_cls_cd = $request->dispClsCd;
        $is_dept_auth = $request->isDeptAuth ?? false; // 指定が無い場合は部門権限のチェックをしない

        $selectable_dept = null;
        if ($is_dept_auth) {
            // 権限チェックありの場合、権限がある部門と所属している部門を画面で選択できるようにする
            // （権限チェック無しの場合、全項目選択可能）
            $selectable_dept = $this->mt13_dept_auth_repository->getChangeableDept($login_id)
                                    ->pluck('DEPT_CD')->toArray();
            $selectable_dept[] = $this->mt10_emp_ref_repository->getDeptWithLoginCd($login_id)->DEPT_CD;
        }
        $dept_list = $this->dep_repository->getSorted($disp_cls_cd);
        return view('search.MT12DeptSearch', compact('request_data', 'dept_list', 'selectable_dept'));
    }

    /**
     * 部門名を検索して返す
     * @return 部門名
     */
    public function getName(Request $request, $dept_cd)
    {
        $disp_cls_cd = $request->dispClsCd;
        $is_dept_auth = $request->isDeptAuth ?? false;
        $dept_name = $this->dep_repository->getName($dept_cd, $disp_cls_cd, $is_dept_auth);
        $msg_2000 = "";
        if ($dept_name == null) {
            $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
        }
        return ['deptName' => $dept_name, 'errorMessage' => $msg_2000];
    }
}
