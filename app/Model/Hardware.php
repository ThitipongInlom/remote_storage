<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    /*
        Hardware V 0.1
    */    
    public $table = "hardwares";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'sticker_number', 
    ];

    public $timestamps = false;

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'hardware_id';
}
