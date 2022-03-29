<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $tableName = 'products';
    public $fillable = ['title', 'description', 'price', 'cate_id', 'images', 'slug'];
}
