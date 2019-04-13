<?php namespace App\Services\Auth;

use App\Models\User\User;
use App\Repositories\User\UserRepository;

class AuthService {

    /**
     * @var UserRepository
     */
    protected $Repository;

    /**
     * AuthService Constructor
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository) {
        $this->Repository = $repository;
    }

    /**
     * User for id
     *
     * @param $id
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function get($id, $with = []) {
        $model = User::with($with);

        // fetch first
        return $model->find($id);
    }

    /**
     * Get user by mobile
     *
     * @param $mobile
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getByMobile($mobile, array $with = []) {
        $user_table = User::$tableName;

        // prepare model
        $model = User::with($with);

        // filter by mobile
        $model->where("$user_table.mobile", $mobile)
            ->whereNotNull("$user_table.mobile");

        // fetch first
        return $model->first();
    }

    /**
     * Get user by auth token
     *
     * @param $auth_token
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getByAuthToken($auth_token, array $with = []) {
        $user_table = User::$tableName;

        // prepare model
        $model = User::with($with);

        // filter by auth token
        $model->where("$user_table.auth_token", $auth_token)
            ->whereNotNull("$user_table.auth_token");

        // fetch first
        return $model->first();
    }
}