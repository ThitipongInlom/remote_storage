<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    /*
        Battery V 0.1
    */    
    public $table = "battery";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'battery_sticker_number', 
        'battery_type',
        'battery_location',
        'battery_hotel',
        'battery_start',
        'battery_end',
    ];

    public $timestamps = false;
    
     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'battery_id';
}
