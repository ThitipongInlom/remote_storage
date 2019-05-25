<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    /*
        Software V 0.1
    */    
    public $table = "softwares";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'sticker_number', 
        'windows',
        'teamviewer',
        'anydesk'
    ];

    public $timestamps = false;
    
     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'software_id';
}
