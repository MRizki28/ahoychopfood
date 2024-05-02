<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\MenuRepositories;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuRepo;

    public function __construct(MenuRepositories $menuRepo)
    {
        $this->menuRepo = $menuRepo;
    }

    public function getAllData()
    {
        return $this->menuRepo->getAllData();
    }
}
