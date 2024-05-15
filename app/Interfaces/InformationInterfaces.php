<?php

namespace App\Interfaces;

use App\Http\Requests\Information\InformationRequest;
use Illuminate\Http\Request;

interface InformationInterfaces {
    public function getData(Request $request);
    public function createData(InformationRequest $request);
    public function getDataById($id);
    public function updateData(InformationRequest $request, $id);
    public function deleteData($id);
}