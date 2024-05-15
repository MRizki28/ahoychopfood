<?php


namespace App\Repositories;

use App\Http\Requests\Information\InformationRequest;
use App\Interfaces\InformationInterfaces;
use App\Models\InformationModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InformationRepositories implements InformationInterfaces
{
    protected $informationModel;
    use HttpResponseTraits;

    public function __construct(InformationModel $informationModel)
    {
        $this->informationModel = $informationModel;
    }

    public function getData(Request $request)
    {
        $search = $request->input('search');
        $limit = $request->input('limit') ? $request->input('limit') : 10;
        $page = (int) $request->input('page', 1);

        $query = $this->informationModel::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
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

    public function createData(InformationRequest $request)
    {
        try {
            $data = new $this->informationModel;
            $data->title = htmlspecialchars($request->input('title'));
            if ($request->hasFile('img_information')) {
                $file = $request->file('img_information');
                $extention = $file->getClientOriginalExtension();
                $filename = 'INFORMATION-' . Str::random(15) . '.' . $extention;
                $file->move(public_path('img_information'), $filename);
                $data->img_information = htmlspecialchars($filename);
            }
            $data->description = htmlspecialchars($request->input('description'));
            $data->save();
            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id)
    {
        $data = $this->informationModel->where('id', $id)->first();
        if (!$data) {
            return $this->idOrDataNotFound();
        } else {
            return $this->success($data);
        }
    }

    public function updateData(InformationRequest $request, $id)
    {
        try {
            $data = $this->informationModel->where('id', $id)->first();
            $data->title = htmlspecialchars($request->input('title'));
            if ($request->hasFile('img_information')) {
                $file = $request->file('img_information');
                $extention = $file->getClientOriginalExtension();
                $filename = 'INFORMATION-' . Str::random(15) . '.' . $extention;
                $file->move(public_path('img_information'), $filename);
                $old_file_path = public_path('img_information/') . $data->img_information;
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }
                $data->img_information = htmlspecialchars($filename);
            }
            $data->description = htmlspecialchars($request->input('description'));
            $data->save();
            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->informationModel->where('id', $id)->first();
            $file = public_path('img_information/') . $data->img_information;
            if (File::exists($file)) {
                File::delete($file);
            }
            $data->delete();

            return $this->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
