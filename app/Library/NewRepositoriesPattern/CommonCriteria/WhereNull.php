<?php

namespace App\Library\NewRepositoriesPattern\CommonCriteria;

use App\Library\NewRepositoriesPattern\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

class WhereNull implements Criteria {

    /**
     * field
     *
     * @var
     */
    private $field;

    /**
     * Constructor.
     *
     * @param $field
     */
    public function __construct($field) {
        $this->field = $field;
    }

    /**
     * Apply filter for status
     *
     * @param Builder $model
     * @return Builder
     */
    public function apply(Builder $model) {
        // get table
        $table = $model->getModel()->getTable();

        // filter for status
        $model->whereNull("$table.$this->field");

        return $model;
    }
}