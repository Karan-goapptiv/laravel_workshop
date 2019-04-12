<?php

namespace App\Models\User;

use App\Models\TraceableBaseModel;

class User extends TraceableBaseModel {
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'USERS';

    /**
     * The attributes that are mass assignable.
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
        'password', 'created_at', 'updated_at'
    ];

    /**
     * Prepare user json with auth token
     */
    public function jsonWithAuthToken() {

        // convert to array
        $userJson = $this->toArray();

        // set auth token
        $userJson['auth_token'] = $this->auth_token;

        // return
        return $userJson;
    }
}
