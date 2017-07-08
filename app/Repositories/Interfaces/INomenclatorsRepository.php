<?php
/**
 * Created by PhpStorm.
 * User: Osmany Torres Leyva
 * Date: 25/06/2017
 * Time: 14:05
 */

namespace CUBiM\Repositories\Interfaces;


/**
 * Interface INomenclatorsRepository
 * @package CUBiM\Repositories\Interfaces
 */
interface INomenclatorsRepository
{
    /**
     * @param $id
     * @param array $with
     * @return mixed
     */
    public function find($id, $with = []);
    /**
     * @param $filters
     * @param array $with
     * @param bool $countOnly
     * @param bool $queryOnly
     * @return mixed
     */
    public function findByFilters($filters, $with = [], $countOnly = false, $queryOnly = false);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $nomenclator
     * @return mixed
     */
    public function save($nomenclator);
}