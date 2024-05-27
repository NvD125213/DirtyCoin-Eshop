<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection; // Thư viện tập hợp nhiều đối tượng Eloquent cùng lúc
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function categoryChild() {
        return $this->hasMany(tb_categories::class, 'parent_id');
    } 

   
}
