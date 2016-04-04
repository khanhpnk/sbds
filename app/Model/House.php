<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kan\Library\Constant;

class House extends Model
{
    public function getCountHousesSell()
    {
        return $this->where('sale_type', Constant::HOUSE_SELL)
                    ->count();
    }
    
    public function getCountHousesRent()
    {
        return $this->where('sale_type', Constant::HOUSE_RENT)
                    ->count();
    }
    
    public function getCountCitiesByQuantityAndHousesSell()
    {
        return $this->select('c.name', \DB::raw('COUNT(*) AS aggregate'))
            ->leftJoin('cities AS c', function ($join) {
                $join->on('houses.city', '=', 'c.id');
            })
            ->where('sale_type', Constant::HOUSE_SELL)
            ->groupBy('c.id')
            ->orderBy('aggregate', 'desc')
            ->limit(5)
            ->get()->toArray();
    }
    
    public function getCountCitiesByQuantityAndHousesRent()
    {
        return $this->select('c.name', \DB::raw('COUNT(*) AS aggregate'))
            ->leftJoin('cities AS c', function ($join) {
                $join->on('houses.city', '=', 'c.id');
            })
            ->where('sale_type', Constant::HOUSE_RENT)
            ->groupBy('c.id')
            ->orderBy('aggregate', 'desc')
            ->limit(5)
            ->get()->toArray();
    }
    
    public function countHousesByCities()
    {
        return $this->select('c.name', 'c.code', \DB::raw('COUNT(*) AS aggregate'))
            ->leftJoin('cities AS c', function ($join) {
                $join->on('houses.city', '=', 'c.id');
            })
            ->groupBy('c.id')
            ->get()->toArray();
    }
}
