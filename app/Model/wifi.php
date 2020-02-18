<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class wifi extends Model
{
    /*
        wifi V 0.1
    */    
    public $table = "wifi";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'wifi_group', 
        'wifi_hotel',
        'wifi_username',
        'wifi_password',
        'wifi_date_start',
        'wifi_date_end',
        'wifi_status',
        'wifi_note',
        'wifi_line_alert_coming',
        'wifi_line_alert_generate',
    ];

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'wifi_id';
}
