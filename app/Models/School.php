<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class School extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address','description','status','phone','email','website','accreditation','image'];
}
