<?php

namespace App\Repositories;

use App\Http\Requests\Category\CategoryRequest;
use App\Interfaces\CategoryInterfaces;
use App\Models\CategoryModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Str;

class CategoryRepositories implements CategoryInterfaces
{
    use HttpResponseTraits;
    protected $categoryModel;

    public function __construct(CategoryModel $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function createData(CategoryRequest $request)
    {
        try {
            $categories = [];
    
            foreach ($request->category as $key => $categoryName) {
                $existingCategory = $this->categoryModel::find($request->id[$key] ?? null);
                if ($existingCategory) {
                    $existingCategory->category = $categoryName;
                } else {
                    $existingCategory = new $this->categoryModel;
                    $existingCategory->category = $categoryName;
                }
    
                if ($request->hasFile('img_category')) {
                    $file = $request->file('img_category')[$key] ?? null;
                    if ($file) {
                        $extension = $file->getClientOriginalExtension();
                        $filename = 'KATEGORI-' . Str::random(5) . '.' . $extension;
                        
                        if ($existingCategory->img_category) {
                            $oldFilePath = public_path('img_category') . '/' . $existingCategory->img_category;
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                        
                        $file->move(public_path('img_category'), $filename);
                        $existingCategory->img_category = $filename;
                    }
                }
    
                $existingCategory->save();
                $categories[] = $existingCategory;
            }
    
            return $this->success($categories);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getAllData()
    {
        $data = $this->categoryModel->all();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }
}
