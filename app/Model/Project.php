<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function getCountProjects(array $options = array())
    {
        return $this->count();
    }
    
    public function getCountCitiesByQuantityAndProjects()
    {
        return $this->select('c.name', \DB::raw('COUNT(*) AS aggregate'))
            ->leftJoin('cities AS c', function ($join) {
                $join->on('projects.city', '=', 'c.id');
            })
            ->groupBy('c.id')
            ->orderBy('aggregate', 'desc')
            ->limit(5)
            ->get()->toArray();
    }
}
