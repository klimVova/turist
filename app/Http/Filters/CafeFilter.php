<?php

namespace App\Http\Filters;



use Illuminate\Database\Eloquent\Builder;

class CafeFilter extends AbstractFilter
{
    const TYPES = 'types';
    const DISTRICTS = 'districts';
    const REPUBLICS = 'republics';
    const CITIES = 'cities';

    protected function getCallbacks(): array
    {
       return [
        self::TYPES => [$this, 'types'],
        self::DISTRICTS => [$this, 'districts'],
        self::REPUBLICS => [$this, 'republics'],
        self::CITIES => [$this, 'cities'],
        ];
    }

    protected function types(Builder $builder, $value){
        $builder->whereIn('type_id' , $value);
    }
    protected function districts(Builder $builder, $value){
        $builder->whereIn('district_id' , $value);
    }
    protected function republics(Builder $builder, $value){
        $builder->whereIn('republic_id' , $value);
    }
    protected function cities(Builder $builder, $value){
        $builder->whereIn('city_id' , $value);
    }
}