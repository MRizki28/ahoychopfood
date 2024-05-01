<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Repositories\CategoryRepositories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositories $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function createData(CategoryRequest $request)
    {
        return $this->categoryRepo->createData($request);
    }

    public function getAllData()
    {
        return $this->categoryRepo->getAllData();
    }
}
