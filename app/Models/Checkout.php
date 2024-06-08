<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'camp_id', 'card_number', 'expired', 'cvc', 'is_paid'];

    // set expired attributes
    public function setExpiredAttribute($value)
    {
        $this->attributes['expired'] = date('Y-m-d', strtotime($value));
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function camp() {
        return $this->belongsTo(Camp::class);
    }
}
