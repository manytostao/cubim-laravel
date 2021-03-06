<?php
/**
 * Created by PhpStorm.
 * User: Osmany Torres Leyva
 * Date: 21/05/2016
 * Time: 19:53
 */

namespace CUBiM\Apis\SearchApi\Filters;


use Illuminate\Database\Eloquent\Builder;

class Active implements Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder|void $builder
     * @internal param $ |Builder $builder
     */
    public static function applyWhere(Builder $builder, $value)
    {
        if (!is_null($value) && $value != '' && $value === 'true')
            return $builder->where('active', '=', 1);
        return $builder;
    }

    /**
     * Apply a given order to the builder instance.
     *
     * @param Builder $builder
     * @param $dir
     * @return Builder $builder
     * @internal param $column
     * @internal param mixed $value
     */
    public static function applyOrderBy(Builder $builder, $dir)
    {
        return $builder->orderBy('active', $dir);
    }

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function applyOrWhere(Builder $builder, $value)
    {
        if (!is_null($value) && $value != '' && $value === 'true')
            return $builder->orWhere('active', '=', 1);
        return $builder;
    }
}