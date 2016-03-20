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
        'company_id', // fix code
        'category',
        'sub_category',
        'title',
        'images',
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

    public function getDesigns(array $options = array())
    {
        $designs = $this->select(
            \DB::raw('
                designs.*,
                c.value AS cityName,
                d.value AS districtName,
                w.value AS wardName,
                c.slug AS citySlug,
                d.slug AS districtSlug,
                w.slug AS wardSlug
            '))
            ->leftJoin('locations AS c', function ($join) {
                $join->on('designs.city', '=', 'c.id')
                    ->where('c.type', '=', 1);
            })
            ->leftJoin('locations AS d', function ($join) {
                $join->on('designs.district', '=', 'd.id')
                    ->where('d.type', '=', 2);
            })
            ->leftJoin('locations AS w', function ($join) {
                $join->on('designs.district', '=', 'w.id')
                    ->where('w.type', '=', 3);
            });
        if (isset($options['citySlug'])) {
            $designs = $designs->where('c.slug', $options['citySlug']);
        }
        if (isset($options['districtSlug'])) {
            $designs = $designs->where('d.slug',  $options['districtSlug']);
        }
        if (isset($options['wardSlug'])) {
            $designs = $designs->where('w.slug',  $options['wardSlug']);
        }

        return $designs->orderBy('designs.id', 'desc');
    }
}
