<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'max_quantity',
        'image',
        'unity_price',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    
    public function products_input()
    {
        return $this->hasMany(Products_input::class);
    }
}
