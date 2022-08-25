<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filter
{
    protected $request;
    protected $builder;
    protected $filters = [ "filter" => [] ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;
        $data = $this->getFilters();
        if ($data != null) {
            foreach ($data as $filter => $value) {
                if (method_exists($this, $filter)) {
                    $this->$filter($value);
                }
            }
        }

        return $this->builder;
    }

    public function getFilters()
    {
        $get_filter = array_filter($this->request->only(["filter"]));
        if (isset($get_filter["filter"])) {
            return $get_filter["filter"];
        }
        return null;
    }
}
