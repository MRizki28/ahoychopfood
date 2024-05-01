<?php

namespace App\Interfaces;

use App\Http\Requests\Category\CategoryRequest;

interface CategoryInterfaces
{
    public function createData(CategoryRequest $request);
    public function getAllData();
}
