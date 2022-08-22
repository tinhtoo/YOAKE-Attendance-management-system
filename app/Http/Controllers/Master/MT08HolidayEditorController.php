<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\MT08HolidayRequest;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT08HolidayRepository;
use Illuminate\Support\Facades\DB;

/**
 * 祝祭日・会社休日情報入力   処理
 */
class MT08HolidayEditorController extends Controller
{
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(MT08HolidayRepository $mt08_holiday
                                            ,MT93PgRepository $pg_repository)
    {
        parent::__construct($pg_repository, '000012');
        $this->mt08_holiday = $mt08_holiday;
    }

    /**
     * 祝祭日・会社休日情報入力   処理 画面表示
     * @return view
     */
    public function index(Request $request)
    {
        $year = date('Y');
        $hld_cls_cd_holidays = '00';
        $hld_cls_cd_company_holidays = '01';

        $holidays = $this->mt08_holiday->getHolidaysWithCls($hld_cls_cd_holidays);
        $company_holidays = $this->mt08_holiday->getHolidaysWithCls($hld_cls_cd_company_holidays);

        return parent::viewWithMenu('master.MT08HolidayEditor', compact('holidays', 'company_holidays','year'));
    }

    public function update(MT08HolidayRequest $request)
    {
        DB::beginTransaction();
        try {
            // 全てのデータを削除
            $this->mt08_holiday->deleteAll();

            // 祝祭日更新
            if ($request['nationalHolidays'] != null) {
                foreach ($request['nationalHolidays'] as $i => $nationalHoliday) {
                    $paramNationalHld[] = array (
                        'HLD_NO' => $i + 1,
                        'HLD_DATE' => substr('0' . $nationalHoliday["monthNat"], -2).substr('0' . $nationalHoliday["dayNat"], -2),
                        'HLD_MONTH' => $nationalHoliday["monthNat"],
                        'HLD_DAY' => $nationalHoliday["dayNat"],
                        'HLD_NAME' => $nationalHoliday["nameNat"],
                        'HLD_CLS_CD' => "00",
                    );
                }
                $this->mt08_holiday->insertHoliday($paramNationalHld);
            }

            // 祝祭日がなければ'HLD_NO'を１にする
            if ($request['nationalHolidays'] == null) {
                $countparamNat = 1;
            } else {
                $countparamNat = count($paramNationalHld) + 1;
            }

            // 会社休日更新
            if ($request['companyHolidays'] != null) {
                foreach ($request['companyHolidays'] as $nationalHoliday) {
                    $paramCompanyHld[] = array (
                        'HLD_NO' => $countparamNat,
                        'HLD_DATE' => substr('0' . $nationalHoliday["monthCom"], -2).substr('0' . $nationalHoliday["dayCom"], -2),
                        'HLD_MONTH' => $nationalHoliday["monthCom"],
                        'HLD_DAY' => $nationalHoliday["dayCom"],
                        'HLD_NAME' => $nationalHoliday["nameCom"],
                        'HLD_CLS_CD' => "01",
                    );
                    $countparamNat++;
                }
                $this->mt08_holiday->insertHoliday($paramCompanyHld);
            }
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e);
            DB::rollback();
        }
        return;
    }
}
