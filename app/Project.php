<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'schedule',
        'location',
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
        'images',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
    ];

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
     * Scope a query to show house is expired or not
     *
     * @param boolean $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired($query, $value)
    {
        if (true == $value) { // Expired
            return $query->where('end_date', '<', Carbon::now());
        } else if (false == $value) { // UnExpired
            return $query->where('end_date', '>=', Carbon::now());
        }
    }

    /**
     * Mutators: convert Youtube link
     *
     * @param  string  $value
     * @return string
     */
    public function getYoutubeAttribute($value)
    {
        if (!empty($value)) {
            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $value, $matches);
            if (0 < count($matches)) {
                $value = 'https://www.youtube.com/embed/' . $matches[1];
            }
        }

        return $value;
    }
}
