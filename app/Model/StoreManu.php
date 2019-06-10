<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StoreManu extends Model
{
    /*
        StoreManu V 0.1
    */    
    public $table = "storemanus";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'storemanu_name', 
    ];    
     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'storemanu_id';
}
