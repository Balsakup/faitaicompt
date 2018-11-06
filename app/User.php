<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{

    use Notifiable;

    protected $fillable = [ 'name', 'email', 'password' ];
    protected $hidden   = [ 'password', 'remember_token'];
    protected $dates    = [ 'created_at', 'updated_at' ];

    public function accounts()
    {
        return $this->belongsToMany(Account::class, 'user_accounts')->orderBy('id', 'ASC');
    }

    public function setPasswordAttribute(string $password)
    {
        if (!empty($password) || Hash::needsRehash($password)) {
            $this->attributes['password'] = Hash::make($password);
        }
    }
}
