<?php


namespace App\Repositories;

use App\Http\Requests\Information\InformationRequest;
use App\Interfaces\InformationInterfaces;
use App\Models\InformationModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Str;

class InformationRepositories implements InformationInterfaces
{
    protected $informationModel;
    use HttpResponseTraits;

    public function __construct(InformationModel $informationModel)
    {
        $this->informationModel = $informationModel;
    }

    public function getData()
    {
        
    }
    
    public function createData(InformationRequest $request)
    {
        try {
            $data = new $this->informationModel;
            $data->title = htmlspecialchars($request->input('title'));
            if ($request->hasFile('img_information')) {
                $file = $request->file('img_information');
                $extention = $file->getClientOriginalExtension();
                $filename = 'INFORMATION-'. Str::random(15) . '.' . $extention;
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
}
