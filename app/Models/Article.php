<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    function getCategory()

    {

        return $this->hasOne(Category::class,'id','category_id');

    }
}
