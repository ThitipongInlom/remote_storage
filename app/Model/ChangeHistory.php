<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChangeHistory extends Model
{
    /*
        ChangeHistory V 0.1
    */    
    public $table = "changehistorys";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'sticker_number', 
        'item_type',
        'item_old',
        'item_change',
        'item_status',
        'remark',
        'users_change',
    ];
     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'changehistory_id';
}
