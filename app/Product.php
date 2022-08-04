<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Hasfactory;

class Product extends Model

    {
        protected $table ='product';
        protected $fillable =['content','status','category_id','image','sale_price','price','name'];
        //hasone 1-1
        public function cat()
        {
            return $this->hasOne(category::class,'id','category_id');
        }
        //check order_detail
        public function hasDetail()
        {
            return $this->hasMany(OrderDetail::class,'product_id','id');
        }
    
        // local scope
        
        public function scopeSearchFilter($query){
            // các trường hợp truy vấn sẽ tiếp nối liên tiếp
            if(request()->key){
                $query = $query ->where('name','like','%'.request()->key.'%');
                }
            if(request()->order){
                $order = explode('-', request()->order);
                $orderBy = isset($order[0]) ? $order[0] :'id';
                $orderValue = isset($order[1]) ? $order[1] :'DESC';
                $query = $query ->orderBy($orderBy, $orderValue);
            
            }
            if(request()->status != ''){
                $status = request()->status;
                $status = $status == 2 ? 0 : 1;
                $query = $query->where('status',$status);
            }
            if(request()->cat){
                $query = $query->where('category_id',request()->cat);
            }
        
        
            return $query;
            }
    }

