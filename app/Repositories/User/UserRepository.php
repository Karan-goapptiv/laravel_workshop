<?php

namespace App\Repositories\User;

use App\Library\NewRepositoriesPattern\Abstracts\Repository;
use App\Models\User\User;

/**
 * Class UserRepository
 */
class UserRepository extends Repository {

    /**
     * Set User entity
     *
     * @return mixed
     */
    public function entity() {
        return User::class;
    }
}