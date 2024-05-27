<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_orderdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Order',
        'id_Product',
        'total_price',
        'quantity'
    ];
    public function getProduct()
    {
        return $this->belongsTo(tb_product::class, 'id_Product');
    }

}
