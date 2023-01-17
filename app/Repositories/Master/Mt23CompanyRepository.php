<?php

namespace App\Repositories\Master;

use Illuminate\Http\Request;
use App\Http\Requests\MT23CompanyEditorRequest;
use App\Models\MT23Company;

class Mt23CompanyRepository
{
    public function companyName()
    {
        /**
         * MT23_Comany 会社名取得
         * @return $items
         */
        $query = MT23Company::query()
            ->orderBy('COMPANY_CD');
        $items = $query->paginate(40);
        return $items;
    }
}
