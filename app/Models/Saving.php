<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name','icon', 'target_amount', 'current_amount', 'deadline', 'note'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function savingsTransactions(){
        return $this->hasMany(SavingsTransaction::class, 'saving_id');
    }
}
