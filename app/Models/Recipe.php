<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $fillable = ['title','description','recipe-image','calories','servings','prep_time'];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_recipe');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'recipe_tag');
    }
}
