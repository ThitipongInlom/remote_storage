<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /*
        Item V 0.1
    */    
    public $table = "item";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'sticker_number', 
        'dep',
        'hotel',
        'name',
        'phone',
        'cpu',
        'ram',
        'case',
        'monitor',
        'mouse',
        'keyboard',
        'mainboard',
        'powersupply',
        'hdd',
        'ssd',
        'ups',
        'ups_battery',
        'windows',
        'teamviewer',
        'anydesk',
        'computer_name',
        'ip_main',
        'ip_sub',
        'internet',
        'license',
        'username_admin',
        'password_admin'
    ];

    public $timestamps = false;

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'item_id';
}
