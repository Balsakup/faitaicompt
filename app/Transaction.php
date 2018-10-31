<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [ 'name', 'amount', 'paid_at', 'transaction_category_id', 'transaction_type_id', 'account_id' ];
    protected $dates    = [ 'paid_at', 'created_at', 'updated_at' ];

    public function category()
    {
        return $this->belongsTo(TransactionCategory::class, 'transaction_category_id');
    }

    public function type()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
