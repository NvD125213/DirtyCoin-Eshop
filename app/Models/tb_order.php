<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_order extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','address', 'address_city', 'phone', 'code_zip', 'email', 'payment'];
    
}
