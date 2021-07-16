<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name' , 'label'];

    public function rules(){
        return $this->belongsToMany(Rule::class);
    }
    

    public function users(){
        return $this->belongsToMany(User::class);
    }

    
}
