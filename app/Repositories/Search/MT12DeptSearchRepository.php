<?php

namespace App\Repositories\Search;

use Illuminate\Http\Request;
use App\Models\MT12Dept;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\MT13DeptAuthRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MT12DeptSearchRepository
{
    /**
     * 部門名取得
     *
     * @param [type] $input_dept_cd　部門名を取得したい部門のコード
     * @param [type] $disp_cls_cd　DISP_CLS_CDの条件　nullの場合、DISP_CLS_CDを検索条件に含めない
     * @param boolean $is_dept_auth　trueの場合、ログインユーザの部門権限を検索条件に含める 未指定またはfalseの場合、権限に関係なく取得する
     * @return 部門名（該当なしの場合null）
     */
    public function getName($input_dept_cd, $disp_cls_cd = null, $is_dept_auth = false)
    {
        $search_result = MT12Dept::select('DEPT_NAME')
                        ->where('DEPT_CD', '=', $input_dept_cd)
                        ->when(!is_null($disp_cls_cd), function ($q) use ($disp_cls_cd) {
                            $q->where('DISP_CLS_CD', '=', $disp_cls_cd);
                        })
                        ->when($is_dept_auth, function ($query) {
                            // 部門権限チェック
                            $login_id = session('id');
                            $login_emp_dept_cd = (new MT10EmpRefRepository())->getDeptWithLoginCd($login_id)->DEPT_CD;
                            $view_dept = (new MT13DeptAuthRepository())->getChangeableDept($login_id);
                            $query->where(function ($q) use ($view_dept, $login_emp_dept_cd) {
                                $q->whereIn('MT12_DEPT.DEPT_CD', $view_dept)
                                    ->orWhere('MT12_DEPT.DEPT_CD', $login_emp_dept_cd);
                            });
                        })
                        ->first();
        return empty($search_result) ? null : $search_result->DEPT_NAME;
    }

    public function getDeptList($disp_cls_cd = null)
    {
        $DeptAllRecord = MT12Dept::select('DEPT_CD', 'DEPT_NAME', 'LEVEL_NO', 'UP_DEPT_CD')
                        ->when(!is_null($disp_cls_cd), function ($q) use ($disp_cls_cd) {
                            $q->where('DISP_CLS_CD', $disp_cls_cd);
                        })
                        ->orderBy('LEVEL_NO')
                        ->orderBy('DEPT_CD')
                        ->get();

        return $DeptAllRecord;
    }

    /**
     * ツリー構造のデータを並び変える
     * 親1,親2,親3,子1,子2　→　親1,子1,親2,子2,親3
     *
     * @param 表示対象の$disp_cls_cd　指定しなければ検索条件に含まない
     * @return
     */
    public function getSorted($disp_cls_cd = null)
    {
        $dept_all = $this->getDeptList($disp_cls_cd);

        // クエリ結果チェック
        if ($dept_all === null) {
            return new Collection();
        }
        $dept_count = $dept_all->count();
        if ($dept_count < 2) {
            return $dept_all;
        }

        $temp_array = array();
        foreach ($dept_all as $dept) {
            // 親無し（最上位）の場合
            if (empty($dept->UP_DEPT_CD)) {
                // そのまま配列に追加して次へ
                $temp_array[] = $dept;
                continue;
            }

            // 親ありの場合
            $i = 0;
            $array_count = count($temp_array);
            // 親まで移動
            for (; $i < $array_count && $temp_array[$i]->DEPT_CD !== $dept->UP_DEPT_CD; $i++) {
            }
            // 親の次に移動
            $i++;
            // 同じ親を持つ子の末尾まで移動
            for (; $i < $array_count && $temp_array[$i]->UP_DEPT_CD === $dept->UP_DEPT_CD; $i++) {
            }

            // 親がいなかった場合追加しない
            if ($i > count($temp_array)) {
                continue;
            }

            // 同じ親を持つ子の末尾に追加
            // array_spliceでオブジェクトを追加すると、「予期せぬ動きをする」ため、一度「1」を設定
            array_splice($temp_array, $i, 0, 1);
            $temp_array[$i] = $dept;
        }
        return collect($temp_array);
    }

    /**
     * 特殊なソートを行うため、ページネーターを手動生成して、該当ページを返す。
     *
     * @param [type] $page
     * @param [type] $url
     * @return Object
     */
    public function getPage($page, $url) : Object
    {
        $sorted_dept = $this->getSorted();
        return new LengthAwarePaginator(
            $sorted_dept->forPage($page, 20),
            count($sorted_dept),
            20,
            $page,
            ['path' => $url]
        );
    }
}
