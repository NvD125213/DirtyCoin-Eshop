<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_list_image extends Model
{
    use HasFactory;
    protected $fillable=['product_id', 'image', 'image_name'];
}
