<?php

namespace App\Library\RepositoriesPattern\Abstracts;


use App\Library\RepositoriesPattern\Contracts\RepositoryContract;
use Illuminate\Database\Eloquent\Builder;

abstract class CriteriaAbstract {

    /** Implements select rules (where clausules) of the criteria, that will be used inside a service or repository to get custom database data.
     * @param Builder $model
     * @param RepositoryContract $rep
     * @return mixed
     */
    abstract public function apply(Builder $model, RepositoryContract $rep);
}