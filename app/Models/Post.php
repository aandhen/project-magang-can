<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    //mendefinisikan kolom yang bisa di isi data
    protected $fillable = ['image', 'title','content',];
    



}
