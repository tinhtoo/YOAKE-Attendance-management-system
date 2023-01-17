<?php

namespace App\Http\Controllers\Shift;

use App\Http\Controllers\Controller;
use App\Models\MT04ShiftPtn;
use App\Http\Requests\MT04ShiftPtnUpdateRequest;
use App\Http\Requests\MT04ShiftPtnDeleteRequest;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT04ShiftPtnRepository;
use App\Repositories\MT05WorkptnRepository;

/**
 * シフトパターン情報入力(新規シフトパターン登録) 処理
 */
class MT04ShiftPtnEditorController extends Controller
{
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT04ShiftPtnRepository $mt04_shiftptn,
        MT05WorkptnRepository $mt05_workptn
    ) {
        parent::__construct($pg_repository, '030001');
        $this->mt04_shiftptn = $mt04_shiftptn;
        $this->mt05_workptn = $mt05_workptn;
    }

    /**
     * シフトパターン情報入力(新規シフトパターン登録) 処理 画面表示
     * @return view
     */
    public function index($id = null)
    {
        $shiftptn_data = new MT04ShiftPtn();
        if ($id != null) {
            $shiftptn_data = $this->mt04_shiftptn->getPrimaryKey($id);
            if ($shiftptn_data === null) {
                return parent::viewErrorWithMenu([
                    'view_path' => '/shift/MT04ShiftPtnReference',
                    'view_name' => 'シフトパターン情報入力',
                    'message' => '2000',
                ]);
            }
        }
        $shiftptn_select = $this->mt04_shiftptn->getWithShiftPtnCd($id);

        $workptn_datas = $this->mt05_workptn->workptnsNormal();

        return parent::viewWithMenu('shift.MT04ShiftPtnEditor', compact(
            'shiftptn_data',
            'workptn_datas',
            'shiftptn_select'
        ));
    }

    public function update(MT04ShiftPtnUpdateRequest $request)
    {
        $today = date('Y-m-d H:i:s');
        $shift_ptn_cd = $request['shiftPtnCd'];
        foreach ($request['shiftPtn'] as $i => $shift_ptn) {
            $param_shift_ptn[] = array (
                'SHIFTPTN_CD' => $shift_ptn_cd,
                'SHIFTPTN_NAME' => $request['shiftPtnName'],
                'DAY_NO' => $i + 1,
                'WORKPTN_CD' => $shift_ptn['workPtn'],
                'RSV1_CLS_CD' => '',
                'RSV2_CLS_CD' => '',
                'UPD_DATE' => $today,
            );
        }
        try {
            \DB::beginTransaction();
            $this->mt04_shiftptn->deleteShiftPtnWithCd($shift_ptn_cd);
            $this->mt04_shiftptn->upsertShiftPtn($param_shift_ptn);
            \DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e);
            \DB::rollback();
        }
        return;
    }

    public function delete(MT04ShiftPtnDeleteRequest $request)
    {
        $shift_ptn_cd = $request['shiftPtnCd'];
        $this->mt04_shiftptn->deleteShiftPtnWithCd($shift_ptn_cd);
        return;
    }
}
