<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{

    protected $fillable = [ 'name', 'label' ];
    protected $dates    = [ 'created_at', 'updated_at' ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderby('account_id', 'ASC')->orderBy('paid_at', 'DESC');
    }
}
