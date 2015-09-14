<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_owner',
        'title',
        'is_sale',
        'price',
        'money_unit',
        'category',
        'start_date',
        'end_date',
        'city',
        'district',
        'ward',
        'address',
        'lat',
        'lng',
        'youtube',
        'description',
        'm2',
        'toilet',
        'floors',
        'direction',
        'road',
        'bedroom',
        'kitchen',
        'living_room',
        'common_room',
        'balcony',
        'logia',
        'license',
        'feature',
        'images',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'feature' => 'array',
        'images' => 'array',
    ];

    /**
     * Scope a query to only house of a given type is owner or not.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsOwner($query, $value)
    {
        return $query->where('is_owner', $value);
    }
}
