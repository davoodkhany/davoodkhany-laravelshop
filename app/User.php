<?php

namespace App;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\EmailVerifiedNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','tow_factor_auth','is_supperuser','is_staff'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

  /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerifiedNotification);
    }


    public function activecode(){

        return $this->hasMany(ActiveCode::class);
    }

    public function isSupperUser(){
        return $this->is_supperuser;
    }

    public function isStaffUser(){
        return $this->is_staff;
    }

    public function rules(){
        return $this->belongsToMany(Rule::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function hasRule($rules)
    {
        return !! $rules->intersect($this->rules)->all();
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name' , $permission->name) || $this->hasRule($permission->rules);
    }


    public function products(){
        return $this->hasMany(Product::class);
    }

}
