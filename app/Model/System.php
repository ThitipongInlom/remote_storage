<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    /*
        System V 0.1
    */    
    public $table = "systems";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'sticker_number', 
        'computer_name',
        'ip_main',
        'ip_sub',
        'teamviewer',
        'anydesk',
    ];

    public $timestamps = false;

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'system_id';
}
