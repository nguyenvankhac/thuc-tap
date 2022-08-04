<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class Cart extends Authenticatable
{
    use Notifiable;
    protected $fillable =['product_id', 'price', 'quantity','customer_id'];
    
    public function pro(){
       return $this->hasOne(Product::class,'id','product_id');
    }
}
