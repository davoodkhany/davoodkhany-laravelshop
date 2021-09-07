<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function child(){
        return $this->hasMany(Category::class, 'parent_id' , 'id');
    }

}

