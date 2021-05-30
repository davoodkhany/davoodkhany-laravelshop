<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{

    protected $table='active_code';


    public $timestamps= false;


    protected $fillable=['user_id', 'code', 'expire_at'];

    public function user(){

        return $this->belongsTo(User::class);

    }



}
