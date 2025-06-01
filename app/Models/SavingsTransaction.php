<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'saving_id',
        'amount',
        'type',
        'date',
        'note'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function savings()
    {
        return $this->belongsTo(Saving::class, 'saving_id');
    }
}
