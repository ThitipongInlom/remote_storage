<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /*
        Hotel V 0.1
    */    
    public $table = "hotels";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'hotel_titel', 
        'hotel_main',
    ];
     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'hotel_id';
}
