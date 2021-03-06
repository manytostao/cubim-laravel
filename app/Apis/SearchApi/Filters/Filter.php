<?php
/**
 * Created by PhpStorm.
 * User: Osmany Torres Leyva
 * Date: 21/05/2016
 * Time: 19:55
 */

namespace CUBiM\Apis\SearchApi\Filters;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function applyWhere(Builder $builder, $value);

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function applyOrWhere(Builder $builder, $value);

    /**
     * Apply a given order to the builder instance.
     *
     * @param Builder $builder
     * @param $dir
     * @return Builder $builder
     * @internal param $column
     * @internal param mixed $value
     */

    public static function applyOrderBy(Builder $builder, $dir);
}