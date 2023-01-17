<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Repositories\Search\MT12DeptSearchRepository;
use Illuminate\Http\Request;

class UpDeptSearchController extends Controller
{
    /**
     * Work_Timeリポジトリの実装
     *
     * @var UpDeptSearchRepository
     */
    protected $mt12_dept;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  UserRepository  $dep_repository
     * @return void
     */
    public function __construct(MT12DeptSearchRepository $mt12_dept_repository)
    {
        $this->mt12_dept = $mt12_dept_repository;
    }

    /**
     * 部門の一覧選択画面を表示する
     * @return 部門選択画面
     */
    public function search(Request $request, $dept_cd)
    {
        $dept_all = $this->mt12_dept->getSorted();
        $dept_cd_level = null;

        // 選択された部門と、その部門の子、孫、…をリスト化して、
        // チェックボックス非表示対象にする。
        $check_hide_list = [];

        foreach ($dept_all as $dept) {
            if ($dept->DEPT_CD === $dept_cd) {
                // 選択された部門のレベルを取得する
                $dept_cd_level = $dept->LEVEL_NO;
                $check_hide_list[] = $dept->DEPT_CD;
            } elseif ($dept_cd_level != null) {
                if ($dept->LEVEL_NO > $dept_cd_level) {
                    // ソート済みのため、レベルが選択された部門より小さい場合
                    // 子、孫…のため、リストに追加
                    $check_hide_list[] = $dept->DEPT_CD;
                } else {
                    // レベルが、選択された部門と同じか小さい場合は
                    // 選択された部門の子、孫…はもう無いためループを終了する
                    break;
                }
            }
        }

        return view('search.UpDeptSearch', compact('dept_all', 'check_hide_list'));
    }
}
