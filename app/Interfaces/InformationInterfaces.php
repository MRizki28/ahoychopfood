<?php

namespace App\Interfaces;

use App\Http\Requests\Information\InformationRequest;

interface InformationInterfaces {
    public function getData();
    public function createData(InformationRequest $request);
}