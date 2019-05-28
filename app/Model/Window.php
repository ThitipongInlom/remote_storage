<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Window extends Model
{
    /*
        Window V 0.1
    */    
    public $table = "windows";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'window_titel', 
        'window_main',
    ];
     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'window_id';
}
