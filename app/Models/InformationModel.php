<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tb_information';
    protected $fillable = [
        'id',
        'title',
        'img_information',
        'description'
    ];
}
