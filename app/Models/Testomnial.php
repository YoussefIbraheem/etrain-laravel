<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testomnial extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['name','spec','desc','image'];
}
