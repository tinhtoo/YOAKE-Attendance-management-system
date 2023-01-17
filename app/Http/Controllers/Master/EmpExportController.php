<?php

namespace App\Http\Controllers\Master;

use App\Filters\EmpExportFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpExportRequest;
use App\Repositories\Master\MT10EmpRefRepository;
use Illuminate\Http\Request;
use App\Repositories\Master\MT11LoginRefRepository;
use App\Repositories\MT13DeptAuthRepository;
use App\Repositories\MT93PgRepository;

/**
 * 社員情報書出処理　処理
 */
class EmpExportController extends Controller
{
    private $header = [
        '*社員コード',
        '*社員名',
        '*社員カナ名',
        '*ログインID',
        '*パスワード',
        '*部門コード',
        '部門名',
        '入社年',
        '入社月',
        '入社日',
        '退職年',
        '退職月',
        '退職日',
        '*在籍区分コード　',
        '在籍区分名',
        '生年月日(年)',
        '生年月日(月)',
        '生年月日(日)',
        '*性別区分コード',
        '性別区分名',
        '*社員区分1コード',
        '社員区分1名',
        '*社員区分2コード',
        '社員区分2名',
        '*使用カレンダーコード',
        '使用カレンダー名',
        '部門権限コード',
        '部門権限名',
        '*機能権限コード',
        '機能権限名',
        '郵便番号',
        '住所1',
        '住所2',
        '電話番号',
        '携帯番号',
        'Eメール',
        '有休付与算出基準年',
        '有休付与算出基準月',
        '*締日コード',
        '締日名',
        '所属コード',
        '所属名',
        '社員２コード',
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
        MT10EmpRefRepository $mt10_rep
    ) {
        parent::__construct($pg_repository, '000020');
        $this->mt11 = $mt11_rep;
        $this->mt13 = $mt13_rep;
        $this->mt10 = $mt10_rep;
    }

    /**
     * 社員情報書出処理　処理 画面表示
     * @return view
     */
    public function index(Request $request)
    {
        return parent::viewWithMenu('master.EmpExport');
    }

    public function export(EmpExportRequest $request, EmpExportFilter $filter)
    {
        $login_id = session('id');
        $login_emp_cd = $this->mt11->getEmpCd($login_id);
        $enable_dept_list = $this->mt13->getChangeableDept($login_id);

        $filename = "社員情報.csv";
        $csv_header = $this->header;
        $output_data = $this->mt10->getEmpDetailCursor($request, $login_emp_cd, $enable_dept_list);

        // 該当データが無ければエラー表示
        if ($output_data->count() === 0) {
            $request->validate(['filter.txtStartDeptCd' => $this->notExist()]);
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
