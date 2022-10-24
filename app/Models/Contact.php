<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['location','phone','city','address','email','shift','favicon','facebook','twitter','instagram','skype'];
}
