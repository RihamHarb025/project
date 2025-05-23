<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_admin', 
        'bio', 
        'image_profile', 
    ];
    public function tags()
{
    return $this->belongsToMany(Tag::class,'tags_users');
}

public function recipes()
{
    return $this->hasMany(Recipe::class);
}
public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    // Relationship for following
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    // To check if the current user is following a specific user
    public function isFollowing(User $user)
    {
        return $this->following()->where('followers.user_id', $user->id)->exists();
    }

    public function likes()
{
    return $this->belongsToMany(Recipe::class, 'likes', 'user_id', 'recipe_id');
}
public function comments()
{
    return $this->hasMany(Comment::class);
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
