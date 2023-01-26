<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'keyboard_id',
        'qty',
    ];

    public function keyboard(){
        return $this->belongsTo(Keyboard::class);
    }

}
