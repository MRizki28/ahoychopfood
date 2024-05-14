<?php

namespace App\Repositories;

use App\Http\Requests\Menu\MenuRequest;
use App\Interfaces\MenuInterfaces;
use App\Models\MenuModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuRepositories implements MenuInterfaces
{
    use HttpResponseTraits;

    protected $menuModel;

    public function __construct(MenuModel $menuModel)
    {
        $this->menuModel = $menuModel;
    }

    public function getAllData(Request $request)
    {

        $search = $request->input('search');
        $limit = $request->input('limit') ? $request->input('limit') : 10;
        $page = (int) $request->input('page', 1);

        $query = $this->menuModel::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $data = $query->paginate($limit, ['*'], 'page', $page);

        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }

    public function createData(MenuRequest $request)
    {
        try {
            $data = new $this->menuModel;
            $data->title = htmlspecialchars($request->input('title'));
            if ($request->hasFile('img_menu')) {
                $file = $request->file('img_menu');
                $extension = $file->getClientOriginalExtension();
                $filename = 'MENU-' . Str::random(10) . '.' . $extension;
                $file->move(public_path('img_menu'), $filename);
                $data->img_menu = $filename;
            }
            $data->description = htmlspecialchars($request->input('description'));
            $data->price = htmlspecialchars($request->input('price'));
            $data->save();

            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id)
    {
        try {
            $data = $this->menuModel::where('id', $id)->first();
            if (!$data) {
                return $this->idOrDataNotFound();
            }else{
                return $this->success($data);
            }
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
