<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class ActiveCode extends Model
{

    protected $table = 'active_code';


    public $timestamps = false;


    protected $fillable=['user_id', 'code', 'expire_at'];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function scopeGenerateCode($query,$user){
        if ($code = $this->codeAliveCodeForUser($user)) {
            $code = $code->code;
        }
         else
        {
            do{
                $code = mt_rand(100000,999999);
            }
            while($this->checkCodeUniqe($user,$code));

            // !! store the code

            $user->activeCode()->create([
                'code' => $code,
                'expire_at' => now()->addMinutes(10)
            ]);
        }
        return $code;
    }



    public function scopeVerifyCode($query, $code,$user){

        return !! $user->activecode()->whereCode($code)->where('expire_at', '>', now())->first();
    }




    public function checkCodeUniqe($user, int $code){

        return !! $user->activeCode()->whereCode($code)->first();
    }

    public function codeAliveCodeForUser($user){

        return $user->activecode()->where('expire_at', '>' , now())->first();

    }

}
