<?php

namespace App\Services\Post;

use App\Http\Services\AuthorizationService;
use App\Repositories\Post\PostRepository;

class PostService {

    /**
     * @var PostRepository
     */
    protected $Repository;

    /**
     * Services
     */
    protected $authService;

    /**
     * FollowUpService constructor
     *
     * @param PostRepository $repository
     * @param AuthorizationService $authService
     */
    public function __construct(PostRepository $repository,
                                AuthorizationService $authService) {
        $this->Repository = $repository;
        $this->authService = $authService;
    }

    /**
     * Find all post
     *
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function find($with = [], $length = 50) {
        return $this->Repository->find($with, $length);
    }

    /**
     * Find all post
     *
     * @param $user_id
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findByUser($user_id, $with = [], $length = 50) {
        return $this->Repository->findByUser($user_id, $with, $length);
    }

    /**
     * Get Post for id
     *
     * @param $id
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById($id, $with = []) {
        return $this->Repository->getById($id, $with);
    }
}