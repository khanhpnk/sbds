<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * User 1-n Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**
     * User 1-n Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messagesTo()
    {
        return $this->hasMany('App\Message', 'to');
    }

    /**
     * User 1-n Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messagesFrom()
    {
        return $this->hasMany('App\Message', 'from');
    }
}
