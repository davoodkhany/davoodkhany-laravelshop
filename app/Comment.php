<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['commentable_id', 'commentable_type','parent_id','comment', 'approved','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function commentable(){
        return $this->morphTo();
    }

    public function Child(){
        // dd($this->parent_id=$parent_id);
        return $this->hasMany(Comment::class,'parent_id','id');
    }





}
