<?php

namespace App\Interfaces;

use App\Http\Requests\Menu\MenuRequest;

interface MenuInterfaces
{
    public function getAllData();
    public function createData(MenuRequest $request);
}