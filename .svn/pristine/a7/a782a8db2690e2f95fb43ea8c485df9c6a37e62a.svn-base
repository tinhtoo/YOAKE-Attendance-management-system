<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Repositories\Search\MT10EmpSearchRepository;
use App\Filters\MT10EmpSearchFilter;
use App\Http\Requests\MT10EmpSearchRequest;
use App\Models\MT99Msg;
use Illuminate\Http\Request;

class MT10EmpSearchController extends Controller
{
    private $emp_repository;
    public function __construct(MT10EmpSearchRepository $emp_Repository)
    {
        $this->emp_repository = $emp_Repository;
    }

    /**
     * 指定ユーザーのプロファイル表示
     *
     * @param  $request
     * @return Response
     */
    public function search(MT10EmpSearchRequest $request, MT10EmpSearchFilter $filter)
    {
        $request_data = $request->all();
        $search_data = $request->input(['filter']);
        $dept_name = $request->input('deptName');

        $reg_cls_cd = $request->regClsCd;
        $is_dept_auth = $request->isDeptAuth ?? false;
        $calendar_cls_cd = $request->calendarClsCd;

        $search_result = $this->emp_repository->search($filter, $reg_cls_cd, $is_dept_auth, $calendar_cls_cd);

        return view('search.MT10EmpSearch', compact('request_data','search_data', 'search_result'));

    }

    /**
     * 社員名を検索して返す
     * @return 社員名
     */
    public function getName(Request $request, $emp_cd)
    {
        $reg_cls_cd = $request->regClsCd;
        $is_dept_auth = $request->isDeptAuth ?? false;
        $calendar_cls_cd = $request->calendarClsCd;
        $get_name = $this->emp_repository->getName($emp_cd, $reg_cls_cd, $is_dept_auth, $calendar_cls_cd);

        if ($get_name == null) {
            $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
            return ['errorMessage' => $msg_2000];
        } else {
            return ['empName' => $get_name['EMP_NAME'], 'deptName' => $get_name['DEPT_NAME']];
        }
    }

}
