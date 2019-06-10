<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StoreMain extends Model
{
    /*
        StoreMain V 0.1
    */    
    public $table = "storemains";
    /**
     * รายชื่อ ตาราง ใน ดาต้าเบส
     */
    protected $fillable = [
        'item_type', 
        'item_name',
        'item_brand',
        'item_model',
        'ip_address',
        'mac_number',
        'serial_no',
        'date_item_in',
        'item_in_stock',
        'location_use',
        'date_location_out',
        'location_lend',
        'user_lend',
        'date_lend_out',
        'date_lend_in',
        'item_img',
    ];
    
     /**
     * ชื่อ ตาราง 
     */   
    protected $primaryKey = 'storemain_id';

}
