<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
       'users_id',
        'transaction_total',
        'transaction_status'
    ];

    protected $hidden = [
        
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class,'transactions_id');
    }
    public function users()
    {
        return $this->hasMany(User::class,'id');
    }
    
    
   
}
