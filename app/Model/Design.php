<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    public function getCountDesigns(array $options = array())
    {
        return $this->count();
    }
    
    public function getCountCitiesByQuantityAndDesigns()
    {
        return $this->select('c.name', \DB::raw('COUNT(*) AS aggregate'))
            ->leftJoin('cities AS c', function ($join) {
                $join->on('designs.city', '=', 'c.id');
            })
            ->groupBy('c.id')
            ->orderBy('aggregate', 'desc')
            ->limit(5)
            ->get()->toArray();
    }
}
