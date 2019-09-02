<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TablePermission extends Model
{

    protected $fillable = [
        'admin_id','permission', 'table'
    ];

    static function insert($id,$permission,$tableName){
        
      
        
    }// insert 
}
