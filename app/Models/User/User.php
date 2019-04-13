<?php

namespace App\Models\User;

use App\Models\TraceableBaseModel;

class User extends TraceableBaseModel {
    /**
     * Table name
     *
     * @var string
     */
    public static $tableName = 'USERS';

    /**
     * Guarded fields
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at', 'auth_token', 'remember_token'
    ];

    /**
     * Prepare user json with auth token
     */
    public function toAuthArray() {
        $userJson = $this->toArray();

        // set auth token
        $userJson['auth_token'] = $this->auth_token;

        return $userJson;
    }
}
