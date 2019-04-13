<?php

namespace App\Http\Services;

use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

/**
 * Singleton class for Access Management
 *
 * @package App\Http\Services
 */
class AuthorizationService {

    /**
     * logged in user
     *
     * @var
     */
    public $user;

    /**
     * @var AuthService
     */
    public $authService;

    /**
     * logged in user role
     *
     * @var
     */
    public $role;
    public $permissions = [];

    /**
     * AuthorizationService constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request) {
        // set service
        $this->authService = app(AuthService::class);

        // get auth token from header
        $auth_token = $request->header('Auth-Token');

        // if not present get token from cookie
        if (!isset($auth_token) || empty($auth_token))
            $auth_token = Cookie::get('Auth-Token');

        // set user
        $this->setUser($auth_token);
    }

    /**
     * set user
     *
     * @param $auth_token
     */
    public function setUser($auth_token) {
        if (isset($auth_token)) {
            $this->user = $this->authService
                ->getByAuthToken($auth_token, []);
        }
    }
}