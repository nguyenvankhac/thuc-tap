<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\Hasfactory;
use Illuminate\Notifications\Notifiable;


class Customer extends Authenticatable
{
    use Notifiable;
    protected $table ='customer';
    protected $fillable = [
      'id', 'name', 'email', 'password', 'phone', 'address', 'gender', 'birthday', 'created_at', 'updated_at', 'remember_token'
    ];
}
