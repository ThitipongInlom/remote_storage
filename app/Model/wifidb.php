<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class wifidb extends Model
{
    /*
        wifidb V 0.1
    */    
    public $table = "wifi_db";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'wifi_db_hotel', 
        'wifi_db_driver',
        'wifi_db_host',
        'wifi_db_database',
        'wifi_db_username',
        'wifi_db_password',
        'wifi_db_port',
    ];

    public $timestamps = false;

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'wifi_db_id';
}
