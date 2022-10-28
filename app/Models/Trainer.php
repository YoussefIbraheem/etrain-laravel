<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['name','email','phone','spec','profile_pic'];

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
