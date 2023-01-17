<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Repositories\Master\MT14AuthRefRepository;
use App\Repositories\MT93PgRepository;

class MT14PGAuthReferenceController extends Controller
{
    private $mt14_auth;

    public function __construct(
        MT14AuthRefRepository $mt14_auth_ref_repository,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '000003');
        $this->mt14_auth = $mt14_auth_ref_repository;
    }

    public function index()
    {
        $all = $this->mt14_auth->getPgAuthPage();
        return parent::viewWithMenu('master.MT14PGAuthReference', compact('all'));
    }
}
