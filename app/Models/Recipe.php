<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    //
    protected $fillable = ['title','description','recipe_image','calories','servings','prep_time','user_id'];

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_recipe');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'recipe_tag');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
    public function likes() {
        return $this->belongsToMany(User::class, 'likes', 'recipe_id', 'user_id');
    }
    public function isLikedBy(User $user)
{
    return $this->likes()->where('user_id', $user->id)->exists();
}
}
