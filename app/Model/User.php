<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /*
        User V 0.1
    */    
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'username', 
        'email',
        'ip_login',
    ];

    /**
     * รายชื่อ ตาราง ที่ซ่อน ใน ดาต้าเบส
     */    
    protected $hidden = [
        'password', 
        'remember_token',
    ];

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'users_id';
}
