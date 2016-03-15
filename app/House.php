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
        'owner_type',
        'title',
        'sale_type',
        'is_sold',
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
        'is_approved'
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
     * Xác định nhà đất là bán hay cho thuê
     *
     * @param $query
     * @param int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSaleType($query, $value)
    {
        return $query->where('sale_type', $value);
    }

    /**
     * @param $query
     * @param int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategory($query, $value)
    {
        return $query->where('category', $value);
    }

    /**
     * @param $query
     * @param int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsApproved($query, $value)
    {
        return $query->where('is_approved', $value);
    }

    /**
     * Xác định nhà đất là đã hết hạn hiển thị hay chưa
     *
     * @param $query
     * @param boolean $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsExpired($query, $value)
    {
        $now = Carbon::now();
        if (true == $value) { // Expired
            return $query->where('start_date', '>', $now)
                ->where('end_date', '<', $now);
        } else if (false == $value) { // UnExpired
            return $query->where('start_date', '<=', $now)
                ->where('end_date', '>=', $now);
        }
    }

    /**
     * Scope a query to show house is owner or not
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsOwner($query, $value)
    {
        return $query->where('owner_type', $value);
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
     * Mutator: Slug, meta_title, meta_description should auto set
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $value = trim(mb_strtolower($value, 'UTF-8'));
        $this->attributes['title'] = $value;

        $this->attributes['meta_title'] = $value;
        $this->attributes['meta_description'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * Accessor: Get a string's first character uppercase.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Accessor: Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartDateAttribute($value)
    {
        return (new \DateTime($value))->format('d/m/Y');
    }

    /**
     * Accessor: convert Youtube link
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

    public function getHouses(array $options = array())
    {
        $houses = $this->select(
            \DB::raw('
                houses.*,
                c.value AS cityName,
                d.value AS districtName,
                w.value AS wardName,
                c.slug AS citySlug,
                d.slug AS districtSlug,
                w.slug AS wardSlug
            '))
            ->leftJoin('locations AS c', function ($join) {
                $join->on('houses.city', '=', 'c.id')
                    ->where('c.type', '=', 1);
            })
            ->leftJoin('locations AS d', function ($join) {
                $join->on('houses.district', '=', 'd.id')
                    ->where('d.type', '=', 2);
            })
            ->leftJoin('locations AS w', function ($join) {
                $join->on('houses.district', '=', 'w.id')
                    ->where('w.type', '=', 3);
            });
        if (isset($options['citySlug'])) {
            $houses = $houses->where('c.slug', $options['citySlug']);
        }
        if (isset($options['districtSlug'])) {
            $houses = $houses->where('d.slug',  $options['districtSlug']);
        }
        if (isset($options['wardSlug'])) {
            $houses = $houses->where('w.slug',  $options['wardSlug']);
        }

        return $houses->orderBy('houses.id', 'desc')->isApproved(1);
    }

    public function getPreviewHouses(array $options = array())
    {
        $houses = $this->select(
            \DB::raw('
                houses.*,
                c.value AS cityName,
                d.value AS districtName,
                w.value AS wardName,
                c.slug AS citySlug,
                d.slug AS districtSlug,
                w.slug AS wardSlug
            '))
            ->leftJoin('locations AS c', function ($join) {
                $join->on('houses.city', '=', 'c.id')
                    ->where('c.type', '=', 1);
            })
            ->leftJoin('locations AS d', function ($join) {
                $join->on('houses.district', '=', 'd.id')
                    ->where('d.type', '=', 2);
            })
            ->leftJoin('locations AS w', function ($join) {
                $join->on('houses.district', '=', 'w.id')
                    ->where('w.type', '=', 3);
            });

        return $houses->orderBy('houses.id', 'desc')->isApproved(1);
    }

    public function getNextHouses(array $options = array())
    {
        $houses = $this->select(
            \DB::raw('
                houses.*,
                c.value AS cityName,
                d.value AS districtName,
                w.value AS wardName,
                c.slug AS citySlug,
                d.slug AS districtSlug,
                w.slug AS wardSlug
            '))
            ->leftJoin('locations AS c', function ($join) {
                $join->on('houses.city', '=', 'c.id')
                    ->where('c.type', '=', 1);
            })
            ->leftJoin('locations AS d', function ($join) {
                $join->on('houses.district', '=', 'd.id')
                    ->where('d.type', '=', 2);
            })
            ->leftJoin('locations AS w', function ($join) {
                $join->on('houses.district', '=', 'w.id')
                    ->where('w.type', '=', 3);
            });

        return $houses->orderBy('houses.id', 'asc')->isApproved(1);
    }
}
