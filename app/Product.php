<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description','brief','discount','amount','category_id','details','image'
    ];
 
    public function category(){
        return $this->belongsTo('\App\Category','category_id');
    }//category
    
}
