<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class order extends Authenticatable
{
    use Notifiable;
    protected $dates = ['deleted_at'];
    protected $fillable =['name', 'email', 'phone', 'address', 'customer_id', 'status', 'total_price', 'created_at'];
    

}
