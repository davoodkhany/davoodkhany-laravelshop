<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title' , 'description' , 'price' , 'view_count', 'inventory' ];



    public function users(){
        return $this->belongsTo(User::class);
    }
}
