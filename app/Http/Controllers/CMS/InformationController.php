<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\InformationRequest;
use App\Repositories\InformationRepositories;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    protected $informationRepo;

    public function __construct(InformationRepositories $informationRepo)
    {
        $this->informationRepo = $informationRepo;
    }

    public function createData(InformationRequest $request)
    {
        return $this->informationRepo->createData($request);
    }
}
