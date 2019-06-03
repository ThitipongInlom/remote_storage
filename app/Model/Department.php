<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /*
        Department V 0.1
    */    
    public $table = "departments";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'department_titel', 
        'department_main',
    ];

    public $timestamps = false;

     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'department_id';
}
