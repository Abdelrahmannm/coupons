<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable=['name','slug','path','url'];
    public function coupons(){
        return $this->hasMany(Coupon::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
