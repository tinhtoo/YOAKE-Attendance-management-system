<?php

namespace App\Http\Controllers\Mng_Oprt;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalendarClearRequest;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\TR01WorkRepository;
use App\Repositories\TR04WorkTimeFixRepository;
use App\Repositories\TR50WorkTimeRepository;
use App\Repositories\TR02EmpCalendarRepository;

/**
 * カレンダー情報クリア処理画面
 */
class CalendarClearController extends Controller
{
    private $tr01;
    private $tr04;
    private $tr50;
    private $tr02;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        TR01WorkRepository $tr01_rep,
        TR04WorkTimeFixRepository $tr04_rep,
        TR50WorkTimeRepository $tr50_rep,
        TR02EmpCalendarRepository $tr02_rep
    ) {
        parent::__construct($pg_repository, '040011');
        $this->tr01 = $tr01_rep;
        $this->tr04 = $tr04_rep;
        $this->tr50 = $tr50_rep;
        $this->tr02 = $tr02_rep;
    }

    /**
     * カレンダー情報クリア処理画面表示
     * @return view
     */
    public function index(Request $request)
    {
        return parent::viewWithMenu('mng_oprt.CalendarClear');
    }

    /**
     * 出退勤情報クリア処理
     * @return view
     */
    public function clear(CalendarClearRequest $request)
    {
        $year = substr($request['ym'], 0, 4);
        $month = (int)substr($request['ym'], 7, 2);
        $emp_cd = $request['txtEmpCd'];

        // 確定チェック
        // 確定済みの場合は削除せず終了
        $request->validate(['ym' => $this->fixCheck($emp_cd, $year, $month)]);

        $this->today = date('Y-m-d H:i:s');
        try {
            \DB::beginTransaction();

            // 更新処理
            $this->updateFunc($emp_cd, $year, $month);

            \DB::commit();
        } catch (\Throwable $e) {
            \Log::debug($e);
            \DB::rollBack();
        }

        return redirect('mng_oprt/CalendarClear');
    }

    private function fixCheck($emp_cd, $year, $month)
    {
        return function ($attribute, $value, $fail) use ($emp_cd, $year, $month) {
            if ($this->tr04->existWithEmpAndYM($emp_cd, $year, $month)) {
                // 確定済みのためクリア処理できません。
                $fail('4032');
            }
        };
    }

    private function updateFunc($emp_cd, $year, $month)
    {
        foreach ($this->tr01->getWithEmpAndCaldYearMonth($emp_cd, $year, $month) as $tr01) {
            $this->tr50->update50WorkWithEmpCdCaldDate(
                $tr01->EMP_CD,
                $tr01->CALD_DATE,
                $this->createTr50ClearData()
            );
            $this->tr01->deleteWithPrimaryKey($tr01->EMP_CD, $tr01->CALD_DATE);
        }
        $this->tr02->deleteWithPrimaryKey($tr01->EMP_CD, $year, $month);
    }

    /**
     * TR50_WORKTIMEのクリア用更新データを返す
     *
     * @param
     * @return Array
     */
    private function createTr50ClearData() : Array
    {
        return [
              'DATA_OUT_CLS_CD' => '00'
            , 'DATA_OUT_DATE'   => ''
            , 'CALD_DATE'       => null
        ];
    }
}
