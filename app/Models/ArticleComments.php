<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComments extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = ['id','deleted_at','created_at','updated_at'];
}
