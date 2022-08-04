<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Category extends Model
{
    
       
    
        protected $table ='category';
        protected $dates =['deleted_at'];
        protected $fillable =['name','status'];
    
    
        //hasMany 1-n
        public function products()
        {
            return $this->hasMany(product::class,'category_id','id');
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
            $query = $query->where('status',request()->status);
        }
    
        return $query;
        }
        
    
}
