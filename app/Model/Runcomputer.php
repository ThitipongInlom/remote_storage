<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Runcomputer extends Model
{
    /*
        Runcomputer V 0.1
    */    
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'sticker_number', 
        'dep',
    ];

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'runcomputer_id';
}
