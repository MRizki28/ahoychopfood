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

    public function getData(Request $request)
    {
        return $this->informationRepo->getData($request);
    }

    public function createData(InformationRequest $request)
    {
        return $this->informationRepo->createData($request);
    }

    public function getDataById($id)
    {
        return $this->informationRepo->getDataById($id);
    }

    public function updateData(InformationRequest $request,$id)
    {
        return $this->informationRepo->updateData($request,$id);
    }

    public function deleteData($id)
    {
        return $this->informationRepo->deleteData($id);
    }
}
