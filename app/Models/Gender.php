<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('id', 'desc');
    }

    public function getName()
    {
        if (app()->getLocale() == 'en')
        {
            return $this->name_en ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }
}
