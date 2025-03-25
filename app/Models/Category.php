<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','image'];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class,'category_recipe');
    }
}
