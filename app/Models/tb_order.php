<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'adress_city',
        'phone',
        'code_zip',
        'email',
        'payment'
    ];
}
