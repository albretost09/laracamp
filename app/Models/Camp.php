<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'price'];

    // create attributes isRegistered
    public function getIsRegisteredAttribute() {
        return $this->checkouts()->whereUserId(auth()->id())->exists();
    }

    public function campBenefits() {
        return $this->hasMany(CampBenefit::class);
    }
    public function checkouts() {
        return $this->hasMany(Checkout::class);
    }
}
