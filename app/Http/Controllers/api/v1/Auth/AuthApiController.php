<?php

namespace App\Http\Controllers\api\v1\Auth;


use App\Http\Controllers\api\BaseApiController;
use App\Http\Requests\MobileLoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\RestResponse;
use App\Models\User\User;
use App\Services\Auth\AuthService;

class AuthApiController extends BaseApiController {

    /**
     * Services
     */
    public $authService;

    /**
     * CommentApiController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService) {
        parent::__construct();
        $this->authService = $authService;
    }

    /**
     * Login user
     *
     * @param MobileLoginRequest $request
     * @return mixed
     */
    public function login(MobileLoginRequest $request) {
        // get user
        $user = $this->authService->getByMobile($request->get('mobile'));

        // check password
        if (password_verify($request->get('password', ''), $user->password)) {

            // set auth token
            $user->auth_token = password_hash(
                $request->get('password') . env('SECRET_KEY'),
                PASSWORD_DEFAULT
            );
            $user->save();

            return RestResponse::done('user', $user->toAuthArray());
        }

        return RestResponse::badRequest(['message', 'Login details invalid']);
    }

    /**
     * Register user request
     *
     * @param RegisterUserRequest $request
     * @return mixed
     */
    public function register(RegisterUserRequest $request) {

        // create user
        User::create([
            'name' => $request->get('name', ''),
            'email' => $request->get('email', ''),
            'mobile' => $request->get('mobile', ''),
            'password' => password_hash($request->get('password'), PASSWORD_DEFAULT)
        ]);

        // return followUps in json format
        return RestResponse::done('message', "User registered successfully");
    }
}