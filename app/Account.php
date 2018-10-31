<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $fillable = [ 'name', 'description' ];
    protected $dates    = [ 'created_at', 'updated_at' ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_accounts');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('paid_at', 'DESC');
    }

    public function getAmountAttribute()
    {
        $debits  = $this->transactions()->where('transaction_type_id', TransactionType::where('name', 'debit')->first()->id)->sum('amount');
        $credits = $this->transactions()->where('transaction_type_id', TransactionType::where('name', 'credit')->first()->id)->sum('amount');

        return $credits - $debits;
    }
}
