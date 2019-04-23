<?php

namespace App\Repositories\User;

use App\Models\User\User;

class UserRepository {

    /**
     * Set User entity
     *
     * @return mixed
     */
    public function entity() {
        return User::class;
    }
}