<?php

namespace App\Services\Comment;

use App\Http\Services\AuthorizationService;
use App\Library\NewRepositoriesPattern\Abstracts\Service;
use App\Repositories\Comment\CommentRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class CommentService
 *
 * @package App\Services\CommentService
 */
class CommentService extends Service {

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
     * @param DatabaseManager $db
     * @param AuthorizationService $authService
     */
    public function __construct(CommentRepository $repository,
                                DatabaseManager $db,
                                AuthorizationService $authService) {
        parent::__construct($repository, $db);
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
        return $this->Repository->findAll($with, $length);
    }

    /**
     * Create comment
     *
     * @param $fields
     * @return mixed
     */
    public function store($fields) {
        return $this->Repository->create($fields);
    }

}