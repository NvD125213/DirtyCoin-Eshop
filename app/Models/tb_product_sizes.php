<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_product_sizes extends Model
{

    use HasFactory;
    protected $fillable = ['product_id', 'size_id'];

}
