<?php

namespace App\Library\RepositoriesPattern\Contracts;

use App\Library\RepositoriesPattern\Abstracts\CriteriaAbstract;

interface CriteriaContract {

    public function skipCriteria($skip = true);

    public function getCriterias();

    public function findByCriteria(CriteriaAbstract $criteria);

    public function pushCriteria(CriteriaAbstract $criteria);

    public function applyCriteria();

}