<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{

    protected $fillable = [ 'name' ];
    protected $dates    = [ 'created_at', 'updated_at' ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('account_id', 'ASC')->orderBy('paid_at', 'DESC');
    }
}
