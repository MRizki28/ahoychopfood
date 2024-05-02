<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tb_category';
    protected $fillable = [
        'id',
        'category',
        'img_category'
    ];

    public function getMenu()
    {
        return $this->hasMany(MenuModel::class , 'id_category');
    }
}
