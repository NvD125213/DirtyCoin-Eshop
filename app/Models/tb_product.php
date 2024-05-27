<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'price',
        'discount',
        'quantity',
        'description',
        'id_Cate',
        'image_path',
        'image_name',
        'view'
    ];
     
    public function images() {
        return $this->hasMany(tb_list_image::class, 'product_id');
    }

    public function tags() {
        return $this
        ->belongsToMany(tb_sizes::class, 'tb_product_sizes', 'product_id', 'size_id')
        ->withTimestamps();
    }
    public function categories() {
        return $this->belongsTo(tb_categories::class, 'id_Cate');
    }
    public function productImages() {
        return $this->hasMany(tb_list_image::class, 'product_id');
    }
}
