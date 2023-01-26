<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'keyboard_id',
        'qty',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function keyboard()
    {
        return $this->belongsTo(Keyboard::class);
    }
}
