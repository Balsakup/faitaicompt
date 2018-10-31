<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{

    protected $fillable = [ 'user_id', 'account_id' ];
    protected $dates    = [ 'created_at', 'updated_at' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
