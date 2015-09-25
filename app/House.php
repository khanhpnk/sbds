<?php

namespace App;

use Carbon\Carbon;
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
     * Scope a query to show house is sale or rent
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsSale($query, $value)
    {
        return $query->where('is_sale', $value);
    }

    /**
     * Scope a query to show house is owner or not
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsOwner($query, $value)
    {
        return $query->where('is_owner', $value);
    }

    /**
     * Scope a query to show house is owner or not
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsSold($query, $value)
    {
        return $query->where('is_sold', $value);
    }

    /**
     * Scope a query to show house is expired or not
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired($query, $value)
    {
        if ($value) { // Expired
            return $query->where('end_date', '<', Carbon::now());
        } else { // UnExpired
            return $query->where('end_date', '>=', Carbon::now());
        }
    }


    /**
     * Mutator: Slug, meta_title, meta_description should auto set
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $value = mb_strtolower($value, 'UTF-8');
        $this->attributes['title'] = $value;

        $this->attributes['meta_title'] = $value;
        $this->attributes['meta_description'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * Mutators: Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartDateAttribute($value)
    {
        return (new \DateTime($value))->format('d/m/Y');
    }
}
