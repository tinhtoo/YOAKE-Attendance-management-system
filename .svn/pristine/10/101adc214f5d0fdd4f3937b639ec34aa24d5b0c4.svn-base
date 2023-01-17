<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT05WorkptnRepository;
use App\Repositories\MT91ClsDetailRepository;
use App\Repositories\MT94WorkDescRepository;
use App\Repositories\Master\MT07FractionRepository;
use App\Http\Requests\MT07FractionRequest;

/**
 * 端数処理情報入力  処理
 */
class MT07FractionEditorController extends Controller
{
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT05WorkptnRepository $mt05_workptn,
        MT07FractionRepository $mt07_fraction,
        MT91ClsDetailRepository $mt91_cls_detail,
        MT94WorkDescRepository $mt94_work_desc
    ) {
        parent::__construct($pg_repository, '000007');
        $this->mt05_workptn = $mt05_workptn;
        $this->mt07_fraction = $mt07_fraction;
        $this->mt91_cls_detail = $mt91_cls_detail;
        $this->mt94_work_desc = $mt94_work_desc;
    }

    /**
     * 端数処理情報入力 処理 画面表示
     * @return view
     */
    public function index()
    {
        return parent::viewWithMenu('master.MT07FractionEditor', $this->createViewData());
    }

    public function view(Request $request)
    {
        $workptn_cd = $request->WORKPTN_CD;
        $work_ptn = $this->mt05_workptn->getWorkPtnWithPrimaryKey($workptn_cd);
        if ($work_ptn === null) {
            return parent::viewErrorWithMenu([
                'view_path' => '/master/MT07FractionEditor',
                'view_name' => '端数処理情報入力',
                'message' => '2000',
            ]);
        }
        $search_fraction_data = $this->mt07_fraction->getDataWithPrimaryKey($workptn_cd);
        return parent::viewWithMenu(
            'master.MT07FractionEditor',
            array_merge($this->createViewData(), compact(
                'search_fraction_data',
                'workptn_cd'
            ))
        );
    }

    public function createViewData()
    {
        $workptn_names = $this->mt05_workptn->getAll();
        // 分未満
        $cls_cd_min = '05';
        $cls_detail_mins = $this->mt91_cls_detail->getClsDetailName($cls_cd_min);
        // 端数処理区分
        $cls_cd_roundingfigures  = '04';
        $cls_detail_rfs = $this->mt91_cls_detail->getClsDetailName($cls_cd_roundingfigures);
        // 残業項目
        $ovt_datas = $this->mt94_work_desc->getOvtms();
        // 割増対象
        $ext_datas = $this->mt94_work_desc->getExts();
        return compact('workptn_names', 'cls_detail_mins', 'cls_detail_rfs', 'ovt_datas', 'ext_datas');
    }

    public function update(MT07FractionRequest $request)
    {
        $today = date('Y-m-d H:i:s');
        // 時間 「出勤時刻、退出時刻、外出時刻、再入時刻」
        $WTHR_UNDER_MI = null;
        $WTHR_FRC_CLS_CD = '';
        $LTHR_UNDER_MI = null;
        $LTHR_FRC_CLS_CD = '';
        $ERHR_UNDER_MI = null;
        $ERHR_FRC_CLS_CD = '';
        $OTHR_UNDER_MI = null;
        $OTHR_FRC_CLS_CD = '';
        // 時刻　「出勤時刻、遅刻時間、早退時間、外出時間」
        $WTTM_UNDER_MI = null;
        $WTTM_FRC_CLS_CD = '';
        $LVTM_UNDER_MI = null;
        $LVTM_FRC_CLS_CD = '';
        $OTTM_UNDER_MI = null;
        $OTTM_FRC_CLS_CD = '';
        $RETM_UNDER_MI = null;
        $RETM_FRC_CLS_CD = '';
        // 時間「FRACTION_CLS_CD '00'」
        if ($request['fractionClsCd'] == '00') {
            $WTHR_UNDER_MI = (int)$request['wthrOverTime'][0];
            $WTHR_FRC_CLS_CD = $request['wthrOverTime'][1];
            $LTHR_UNDER_MI = (int)$request['lthrOverTime'][0];
            $LTHR_FRC_CLS_CD = $request['lthrOverTime'][1];
            $ERHR_UNDER_MI = (int)$request['erhrOverTime'][0];
            $ERHR_FRC_CLS_CD = $request['erhrOverTime'][1];
            $OTHR_UNDER_MI = (int)$request['othrOverTime'][0];
            $OTHR_FRC_CLS_CD = $request['othrOverTime'][1];
        }
        // 時刻「FRACTION_CLS_CD '01'」
        if ($request['fractionClsCd'] == '01') {
            $WTTM_UNDER_MI = (int)$request['wttmExtraTime'][0];
            $WTTM_FRC_CLS_CD = $request['wttmExtraTime'][1];
            $LVTM_UNDER_MI = (int)$request['lvtmExtraTime'][0] ;
            $LVTM_FRC_CLS_CD = $request['lvtmExtraTime'][1];
            $OTTM_UNDER_MI = (int)$request['ottmExtraTime'][0];
            $OTTM_FRC_CLS_CD = $request['ottmExtraTime'][1];
            $RETM_UNDER_MI = (int)$request['retmExtraTime'][0];
            $RETM_FRC_CLS_CD = $request['retmExtraTime'][1];
        }
        $param_fraction = [
            'WORKPTN_CD' => $request['workPtnCd'],
            'FRACTION_CLS_CD' => $request['fractionClsCd'],
            'WTHR_UNDER_MI' => $WTHR_UNDER_MI,
            'WTHR_FRC_CLS_CD' => $WTHR_FRC_CLS_CD,
            'LTHR_UNDER_MI' => $LTHR_UNDER_MI,
            'LTHR_FRC_CLS_CD' => $LTHR_FRC_CLS_CD,
            'ERHR_UNDER_MI' => $ERHR_UNDER_MI,
            'ERHR_FRC_CLS_CD' => $ERHR_FRC_CLS_CD,
            'OTHR_UNDER_MI' => $OTHR_UNDER_MI,
            'OTHR_FRC_CLS_CD' => $OTHR_FRC_CLS_CD,
            'WTTM_UNDER_MI' => $WTTM_UNDER_MI,
            'WTTM_FRC_CLS_CD' => $WTTM_FRC_CLS_CD,
            'LVTM_UNDER_MI' => $LVTM_UNDER_MI,
            'LVTM_FRC_CLS_CD' => $LVTM_FRC_CLS_CD,
            'OTTM_UNDER_MI' => $OTTM_UNDER_MI,
            'OTTM_FRC_CLS_CD' => $OTTM_FRC_CLS_CD,
            'RETM_UNDER_MI' => $RETM_UNDER_MI,
            'RETM_FRC_CLS_CD' => $RETM_FRC_CLS_CD,
            'OVTM1_CD' => $request['overTime'][0]['ovtCD'] ?? '',
            'OVTM1_UNDER_MI' => $request['overTime'][0]['ovtUnderMi'] ?
                                    (int)$request['overTime'][0]['ovtUnderMi'] : null,
            'OVTM1_FRC_CLS_CD' => $request['overTime'][0]['ovtFrcClsCd'] ?? '',
            'OVTM2_CD' => $request['overTime'][1]['ovtCD'] ?? '',
            'OVTM2_UNDER_MI' => $request['overTime'][1]['ovtUnderMi'] ?
                                    (int)$request['overTime'][1]['ovtUnderMi'] : null,
            'OVTM2_FRC_CLS_CD' => $request['overTime'][1]['ovtFrcClsCd'] ?? '',
            'OVTM3_CD' => $request['overTime'][2]['ovtCD'] ?? '',
            'OVTM3_UNDER_MI' => $request['overTime'][2]['ovtUnderMi'] ?
                                    (int)$request['overTime'][2]['ovtUnderMi'] : null,
            'OVTM3_FRC_CLS_CD' => $request['overTime'][2]['ovtFrcClsCd'] ?? '',
            'OVTM4_CD' => $request['overTime'][3]['ovtCD'] ?? '',
            'OVTM4_UNDER_MI' => $request['overTime'][3]['ovtUnderMi'] ?
                                    (int)$request['overTime'][3]['ovtUnderMi'] : null,
            'OVTM4_FRC_CLS_CD' => $request['overTime'][3]['ovtFrcClsCd'] ?? '',
            'OVTM5_CD' => $request['overTime'][4]['ovtCD'] ?? '',
            'OVTM5_UNDER_MI' => $request['overTime'][4]['ovtUnderMi'] ?
                                    (int)$request['overTime'][4]['ovtUnderMi'] : null,
            'OVTM5_FRC_CLS_CD' => $request['overTime'][4]['ovtFrcClsCd'] ?? '',
            'OVTM6_CD' => $request['overTime'][5]['ovtCD'] ?? '',
            'OVTM6_UNDER_MI' => $request['overTime'][5]['ovtUnderMi'] ?
                                    (int)$request['overTime'][5]['ovtUnderMi'] : null,
            'OVTM6_FRC_CLS_CD' => $request['overTime'][5]['ovtFrcClsCd'] ?? '',
            'OVTM7_CD' => '',
            'OVTM7_UNDER_MI' => null,
            'OVTM7_FRC_CLS_CD' => '',
            'OVTM8_CD' => '',
            'OVTM8_UNDER_MI' => null,
            'OVTM8_FRC_CLS_CD' => '',
            'OVTM9_CD' => '',
            'OVTM9_UNDER_MI' => null,
            'OVTM9_FRC_CLS_CD' => '',
            'OVTM10_CD' => '',
            'OVTM10_UNDER_MI' => null,
            'OVTM10_FRC_CLS_CD' => '',
            'EXT1_CD' => $request['extraTime'][0]['extCD'] ?? '',
            'EXT1_UNDER_MI' => $request['extraTime'][0]['extUnderMi'] ?
                                    (int)$request['extraTime'][0]['extUnderMi'] : null,
            'EXT1_FRC_CLS_CD' => $request['extraTime'][0]['extFrcClsCd'] ?? '',
            'EXT2_CD' => $request['extraTime'][1]['extCD'] ?? '',
            'EXT2_UNDER_MI' => $request['extraTime'][1]['extUnderMi'] ?
                                    (int)$request['extraTime'][1]['extUnderMi'] : null,
            'EXT2_FRC_CLS_CD' => $request['extraTime'][1]['extFrcClsCd'] ?? '',
            'EXT3_CD' => $request['extraTime'][2]['extCD'] ?? '',
            'EXT3_UNDER_MI' => $request['extraTime'][2]['extUnderMi'] ?
                                    (int)$request['extraTime'][2]['extUnderMi'] : null,
            'EXT3_FRC_CLS_CD' => $request['extraTime'][2]['extFrcClsCd'] ?? '',
            'EXT4_CD' => '',
            'EXT4_UNDER_MI' => null,
            'EXT4_FRC_CLS_CD' => '',
            'EXT5_CD' => '',
            'EXT5_UNDER_MI' => null,
            'EXT5_FRC_CLS_CD' => '',
            'RSV1_CLS_CD' => '',
            'RSV2_CLS_CD' => '',
            'UPD_DATE' => $today,
        ];
        $update_col = ['FRACTION_CLS_CD',
        'WTHR_UNDER_MI',
        'WTHR_FRC_CLS_CD',
        'LTHR_UNDER_MI',
        'LTHR_FRC_CLS_CD',
        'ERHR_UNDER_MI',
        'ERHR_FRC_CLS_CD',
        'OTHR_UNDER_MI',
        'OTHR_FRC_CLS_CD',
        'WTTM_UNDER_MI',
        'WTTM_FRC_CLS_CD',
        'LVTM_UNDER_MI',
        'LVTM_FRC_CLS_CD',
        'OTTM_UNDER_MI',
        'OTTM_FRC_CLS_CD',
        'RETM_UNDER_MI',
        'RETM_FRC_CLS_CD',
        'OVTM1_CD',
        'OVTM1_UNDER_MI',
        'OVTM1_FRC_CLS_CD',
        'OVTM2_CD',
        'OVTM2_UNDER_MI',
        'OVTM2_FRC_CLS_CD',
        'OVTM3_CD',
        'OVTM3_UNDER_MI',
        'OVTM3_FRC_CLS_CD',
        'OVTM4_CD',
        'OVTM4_UNDER_MI',
        'OVTM4_FRC_CLS_CD',
        'OVTM5_CD',
        'OVTM5_UNDER_MI',
        'OVTM5_FRC_CLS_CD',
        'OVTM6_CD',
        'OVTM6_UNDER_MI',
        'OVTM6_FRC_CLS_CD',
        'EXT1_CD',
        'EXT1_UNDER_MI',
        'EXT1_FRC_CLS_CD',
        'EXT2_CD',
        'EXT2_UNDER_MI',
        'EXT2_FRC_CLS_CD',
        'EXT3_CD',
        'EXT3_UNDER_MI',
        'EXT3_FRC_CLS_CD'];
        $this->mt07_fraction->upsertFraction($param_fraction, $update_col);
        return;
    }

    public function delete(Request $request)
    {
        $workptn_cd = $request['WORKPTN_CD_HIDE'];
        $this->mt07_fraction->deleteFraction($workptn_cd);
        return redirect('master/MT07FractionEditor');
    }
}
