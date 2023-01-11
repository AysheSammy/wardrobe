<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    const UPDATED_AT = null;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function customerAddresses()
    {
        return $this->hasMany(CustomerAddress::class)
            ->orderBy('id', 'desc');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'customer_product')->orderBy('id', 'desc');
    }
}
