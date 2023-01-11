<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class)->withTrashed()->orderBy('id', 'desc');
    }

    public function customerAddresses()
    {
        return $this->hasMany(CustomerAddress::class)->orderBy('id', 'desc');
    }

    public function getName()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }
}
