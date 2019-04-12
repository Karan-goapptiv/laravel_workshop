<?php

namespace App\Http\Criteria\User;

use App\Library\NewRepositoriesPattern\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

class ForAuthTokenAndNotNull implements Criteria {

    /**
     * organizationCode
     *
     * @var
     */
    private $authToken;

    /**
     * Constructor.
     *
     * @param $authToken
     */
    public function __construct($authToken) {
        $this->authToken = $authToken;
    }

    /**
     * Apply filter for mobile
     *
     * @param Builder $model
     * @return Builder
     */
    public function apply(Builder $model) {
        // get table
        $table = $model->getModel()->getTable();

        $model->where("$table.auth_token", $this->authToken)
            ->whereNotNull("$table.auth_token");

        return $model;
    }
}