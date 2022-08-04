<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductImage extends Model
{
    protected $table ='product_images';
    protected $fillable =['product_id','image','status'];
    public $timestamps = false; //loai bo create_at va updated_at
}
