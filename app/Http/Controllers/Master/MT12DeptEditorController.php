<?php

namespace App\Http\Controllers\Master;

use App\Repositories\Master\MT12DeptRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MT12DeptEditorRequest;
use App\Http\Requests\MT12DeptDeleteRequest;
use App\Models\MT12Dept;
use App\Repositories\MT93PgRepository;

class MT12DeptEditorController extends Controller
{
    protected $dept_repository;

    /**
     * コンストラクタ
     * リポジトリのインスタンスを生成、格納
     *
     * @param  UserRepository  $dept_repository
     * @return
     */
    public function __construct(
        MT12DeptRepository $dept_repository,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '000004');
        $this->dept_repository = $dept_repository;
    }

    /**
     * 画面表示
     *
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id = null)
    {
        $dept_data = new MT12Dept();
        if ($id != null) {
            $dept_data = $this->dept_repository->getWithPrimary($id);
            if ($dept_data === null) {
                return parent::viewErrorWithMenu([
                    'view_path' => '/master/MT12DeptReference',
                    'view_name' => '部門情報入力',
                    'message' => '2000',
                ]);
            }
        }

        $dept_lists = $this->dept_repository->deptList($id);

        return parent::viewWithMenu('master.MT12DeptEditor', compact('dept_data', 'dept_lists'));
    }

    /**
     * 登録更新
     *
     * @param MT12DeptEditorRequest $request
     * @return void
     */
    public function upsert(MT12DeptEditorRequest $request)
    {
        try {
            DB::beginTransaction();
            $upDeptCD = $request->input('txtUpDeptCd');
            $this->dept_repository->deleteDeptWithUp($upDeptCD);

            $today = date('Y-m-d H:i:s');

            $param = [
                'DEPT_CD' => $request->txtUpDeptCd,
                'DEPT_NAME' => $request->txtUpDeptName,
                'UPD_DATE' => $today
            ];
            $this->dept_repository->updateDept($param);

            if (isset($request['deptData'])) {
                foreach ($request['deptData'] as $deptData) {
                    $paramList[] = array (
                        'DEPT_CD' => $deptData["deptCd"],
                        'DEPT_NAME' => $deptData["deptName"],
                        'UP_DEPT_CD' => $request->txtUpDeptCd,
                        'LEVEL_NO' => $request->deptLevelNo + 1,
                        'DISP_CLS_CD' => "01",
                        'RSV1_CLS_CD' => '',
                        'RSV2_CLS_CD' => '',
                        'UPD_DATE' => $today
                    );
                }
                $this->dept_repository->upsertDept($paramList);
            }

            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e);
            DB::rollback();
        }

        return ;
    }

     /**
     * 削除
     *
     * @param MT12DeptDeleteRequest $request
     * @return void
     */
    public function delRow(MT12DeptDeleteRequest $request)
    {
        // バリデーションのみ
        // 削除の登録は「更新」ボタン押下時に行う
        return ;
    }

    public function delete(MT12DeptEditorRequest $request)
    {
        $upDeptCD = $request->input('txtUpDeptCd');

        DB::beginTransaction();
        try {
            $this->dept_repository->deleteDeptWithUp($upDeptCD);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e);
            DB::rollback();
        }

        return;
    }
}
