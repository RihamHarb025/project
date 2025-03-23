<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['username','email','password','bio','image-profile','preference'];
}
