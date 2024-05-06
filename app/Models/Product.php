<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = ['product_code','category_id','product_name',
'brand_id','product_desc','product_content','product_price','product_image','product_size',
'product_color','product_status'];
    protected $primaryKey = 'product_id ' ;
    protected $table = 'product';
}
