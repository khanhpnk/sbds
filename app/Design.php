<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
        'sub_category',
        'title',
        'designers',
        'designers_furniture',
        'supervisor',
        'year',
        'land_m2',
        'build_m2',
        'number_of_floors',
        'frontage_m2',
        'city',
        'district',
        'ward',
        'address',
        'lat',
        'lng',
        'youtube',
        'description',
    ];
}
