<?php

namespace App\Services\Comment;

use App\Http\Services\AuthorizationService;
use App\Repositories\Comment\CommentRepository;


class CommentService {

    /**
     * @var CommentRepository
     */
    protected $Repository;

    /**
     * Services
     */
    protected $authService;

    /**
     * CommentService constructor
     *
     * @param CommentRepository $repository
     * @param AuthorizationService $authService
     */
    public function __construct(CommentRepository $repository,
                                AuthorizationService $authService) {
        $this->Repository = $repository;
        $this->authService = $authService;
    }

    /**
     * Find all comments
     *
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll($with = [], $length = 50) {
        return $this->Repository->find($with, $length);
    }

    /**
     * Find all comments for post id
     *
     * @param $post_id
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findForPostId($post_id, $with = [], $length = 50) {
        return $this->Repository->findForPostId($post_id, $with, $length);
    }
}