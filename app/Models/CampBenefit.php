<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampBenefit extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function camps() {
        return $this->belongsTo(Camp::class);
    }
}