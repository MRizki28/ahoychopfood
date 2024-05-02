<?php

namespace App\Repositories;

use App\Interfaces\MenuInterfaces;
use App\Models\MenuModel;
use App\Traits\HttpResponseTraits;

class MenuRepositories implements MenuInterfaces
{
    use HttpResponseTraits;

    protected $menuModel;

    public function __construct(MenuModel $menuModel)
    {
        $this->menuModel = $menuModel;
    }

    public function getAllData()
    {
        $data = $this->menuModel->with('getCategory')->get();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        }else{
            return $this->success($data);
        }
    }
}