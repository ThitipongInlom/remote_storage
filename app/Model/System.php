<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    /*
        System V 0.1
    */    
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'sticker_number', 
        'computer_name',
        'ip_1',
        'ip_2',
        'teamviewer',
        'anydesk',
    ];

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'system_id';
}
