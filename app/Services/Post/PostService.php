<?php

namespace App\Services\Post;

use App\Http\Services\AuthorizationService;
use App\Library\NewRepositoriesPattern\Abstracts\Service;
use App\Repositories\Post\PostRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class PostService
 *
 * @package App\Services\Post\PostService
 */
class PostService extends Service {

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
     * @param DatabaseManager $db
     * @param AuthorizationService $authService
     */
    public function __construct(PostRepository $repository,
                                DatabaseManager $db,
                                AuthorizationService $authService) {
        parent::__construct($repository, $db);
        $this->authService = $authService;
    }

    /**
     * Find all post
     *
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll($with = [], $length = 50) {
        return $this->Repository->findAll($with, $length);
    }

    /**
     * Find Post for id
     *
     * @param $id
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById($id, $with = []) {
        return $this->Repository->getById($id, $with);
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