<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\MT13DeptAuth;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT13DeptAuthRepository;
use App\Repositories\Search\MT12DeptSearchRepository;
use App\Http\Requests\MT13DeptAuthEditorRequest;
use App\Http\Requests\MT13DeptAuthDeleteRequest;
use Illuminate\Support\Facades\DB;

/**
 * 部門権限情報入力  処理
 */
class MT13DeptAuthEditorController extends Controller
{
    /**
     *
     * @param
     * @return
     */
    public function __construct(
        MT13DeptAuthRepository $dept_auth_ref_repository,
        MT12DeptSearchRepository $dept_search_repository,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '000005');
        $this->mt13dept_auth_ref_repository = $dept_auth_ref_repository;
        $this->mt12dept_search = $dept_search_repository;
    }

    /**
     * 画面表示
     * 引数がない、またはnullの場合は新規登録
     *
     * @param [type] $id
     * @return void
     */
    public function index($id = null)
    {
        $dept_auth_data = new MT13DeptAuth();
        if ($id != null) {
            $dept_auth_data = $this->mt13dept_auth_ref_repository->getPrimaryKey($id);
        }
        $disp_cls_cd = '01';
        $all_dept_list = $this->mt12dept_search->getSorted($disp_cls_cd);
        $dept_auth = $this->mt13dept_auth_ref_repository->getDeptIn($id)->pluck('DEPT_CD')->toArray();

        return parent::viewWithMenu('master.MT13DeptAuthEditor', compact(
            'dept_auth_data',
            'all_dept_list',
            'dept_auth'
        ));
    }

    /**
     *
     * 更新
     *
     * @param
     * @return
     */
    public function upsert(MT13DeptAuthEditorRequest $request)
    {
        $update_dept_auth_cd = $request->input('txtDeptAuthCd');
        $today = date('Y-m-d H:i:s');

        foreach ($request['chkListSelect'] as $checked_dept_cd) {
            $param[] = array(
                'DEPT_AUTH_CD' => $update_dept_auth_cd,
                'DEPT_AUTH_NAME'=> $request->txtDeptAuthName,
                'DEPT_CD '=>$checked_dept_cd,
                'RSV1_CLS_CD' => '',
                'RSV2_CLS_CD' => '',
                'UPD_DATE' => $today
            );
        }
        $update_col = ['DEPT_AUTH_NAME','DEPT_CD','UPD_DATE'];
        DB::beginTransaction();
        try {
            $this->mt13dept_auth_ref_repository->deleteDeptAuth($update_dept_auth_cd);
            $this->mt13dept_auth_ref_repository->upsertDeptAuth($param, $update_col);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e);
            DB::rollback();
        }

        if ($request->hideDeptAuthCd != null) {
            return redirect('master/MT13DeptAuthReference');
        }
        return redirect('master/MT13DeptAuthEditor');
    }

    public function delete(MT13DeptAuthDeleteRequest $request)
    {
        $delete_select_dept_auth = $request->input('txtDeptAuthCd');
        DB::beginTransaction();
        try {
            $this->mt13dept_auth_ref_repository->deleteDeptAuth($delete_select_dept_auth);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e);
            DB::rollback();
        }
        return redirect('master/MT13DeptAuthReference');
    }
}
