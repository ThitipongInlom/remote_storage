<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    /*
        Guest V 0.1
    */    
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'sticker_number', 
        'guest_dep', 
        'guest_name', 
        'guest_phone', 
    ];

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'guests_id';
}
