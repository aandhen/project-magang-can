<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    //mendefinisikan kolom yang bisa di isi data
    protected $fillable = ['name', 'nisn','gender','date_of_birth','place_of_birth','image'];
}
