<?php

namespace App\Library\NewRepositoriesPattern\CommonCriteria;

use App\Library\NewRepositoriesPattern\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

class SelectFilter implements Criteria {

    private $selectRaw;

    /**
     * Constructor
     *
     * @param $selectRaw
     */
    public function __construct($selectRaw = null) {
        $this->selectRaw = $selectRaw;
    }

    /**
     * Add select statement
     *
     * @param Builder $model
     * @return Builder
     */
    public function apply(Builder $model) {
        if (!isset($this->selectRaw))
            $model->selectRaw($model->getModel()->getTable() . '.*');
        else
            $model->selectRaw($this->selectRaw);
        return $model;
    }
}