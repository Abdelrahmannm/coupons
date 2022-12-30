<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=['name','slug','discount','description','brand_id'];
    use HasFactory;
    public function brand(){
        return $this->belongsTo(Brand::class);
    }


    public function scopeFilter($query, array $filters)
    {
        // if($filters['brand'] ?? false){
        //     $query->where('brand_id',request('brand'));
        // }
        if($filters['search'] ?? false){
            $query->where('name','like' ,'%'.request('search').'%')
            ->orWhere('slug','like' ,'%'.request('search').'%')
            ->orWhere('description','like' ,'%'.request('search').'%')
            ->orWhere('discount',request('search'))
            ->orWhere('id',request('search'));
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
