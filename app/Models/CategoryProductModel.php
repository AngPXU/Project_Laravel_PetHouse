<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_name','category_slug', 'category_desc', 'meta_keywords', 'category_status', 'category_order', 'category_parent'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';

    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
