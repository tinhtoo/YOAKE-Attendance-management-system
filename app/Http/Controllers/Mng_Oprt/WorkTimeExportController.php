<?php

namespace App\Http\Controllers\Mng_Oprt;

use App\Filters\WorkTimeExportFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkTimeExportRequest;
use App\Repositories\Master\MT11LoginRefRepository;
use App\Repositories\MT13DeptAuthRepository;
use App\Repositories\MT23CompanyRepository;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\TR01WorkRepository;

/**
 * 勤務実績情報出力画面
 */

class WorkTimeExportController extends Controller
{
    private $mt11;
    private $mt13;
    private $mt23;
    private $tr01;
    private $detail_header = [
        '所属コード',
        '所属名',
        '社員コード',
        '社員名',
        '社員区分コード',
        '社員区分名',
        '日付',
        '曜日',
        '出勤',
        '外出1',
        '戻り1',
        '退勤',
        'シフト',
        '実働',
        '所定',
        '深夜手当',
        '普通残業',
        '深夜残業',
        '休日普通残業',
        '休日深夜残業',
        '休日出勤',
        '遅刻時間',
    ];
    private $total_header = [
        '所属コード',
        '所属名',
        '社員コード',
        '社員名',
        '社員区分コード',
        '社員区分名',
        '就業日数',
        '就業時間',
        '所定日数',
        '所定時間',
        '遅刻時間',
        '深夜手当',
        '普通残業',
        '深夜残業',
        '休日普通残業',
        '休日深夜残業',
        '休日出勤',
    ];

    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT11LoginRefRepository $mt11_rep,
        MT13DeptAuthRepository $mt13_rep,
        MT23CompanyRepository $mt23_rep,
        TR01WorkRepository $tr01_rep
    ) {
        parent::__construct($pg_repository, '042000');
        $this->mt11 = $mt11_rep;
        $this->mt13 = $mt13_rep;
        $this->mt23 = $mt23_rep;
        $this->tr01 = $tr01_rep;
    }

    /**
     * 勤務実績情報出力画面表示
     * @return view
     */
    public function index(Request $request)
    {
        $company_list = $this->mt23->getDisp(); // 会社所属情報
        return parent::viewWithMenu('mng_oprt.WorkTimeExport', compact('company_list'));
    }

    public function export(WorkTimeExportRequest $request, WorkTimeExportFilter $filter)
    {
        $login_id = session('id');
        $login_emp_cd = $this->mt11->getEmpCd($login_id);
        $enable_dept_list = $this->mt13->getChangeableDept($login_id);

        if ($request['filter']['exportCategory']) {
            $filename = "勤務実績集計.csv";
            $csv_header = $this->total_header;
            $output_data = $this->tr01->getWorkTimeTotalCursor($request, $login_emp_cd, $enable_dept_list);
        } else {
            $filename = "勤務実績明細.csv";
            $csv_header = $this->detail_header;
            $output_data = $this->tr01->getWorkTimeDetailCursor($filter, $login_emp_cd, $enable_dept_list);
        }

        // 該当データが無ければエラー表示
        if ($output_data->count() === 0) {
            $request->validate(['filter.startDate' => $this->notExist()]);
        }

        $header = ['Content-Type' => 'application/octet-stream'];

        return response()->streamDownload(parent::outputCsv($csv_header, $output_data), $filename, $header);
    }

    private function notExist()
    {
        return function ($attribute, $value, $fail) {
            // 該当データが存在しません。
            $fail('2000');
        };
    }
}
