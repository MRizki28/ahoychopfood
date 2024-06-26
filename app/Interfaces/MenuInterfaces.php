<?php

namespace App\Interfaces;

use App\Http\Requests\Menu\MenuRequest;
use Illuminate\Http\Request;

interface MenuInterfaces
{
    public function getAllData(Request $request);
    public function createData(MenuRequest $request);
    public function getDataById($id);
    public function updateData(MenuRequest $request, $id);
    public function deleteData($id);
}