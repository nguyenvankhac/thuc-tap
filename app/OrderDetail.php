<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderDetail extends Model
{
 

    protected $table ='Orderdetail';
    protected $fillable =['orders_id','product_id','price','quantity','created_at'];


   
    
}