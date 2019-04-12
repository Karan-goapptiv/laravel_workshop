<?php

namespace App\Repositories\Comment;

use App\Library\NewRepositoriesPattern\Abstracts\Repository;
use App\Models\Comment\Comment;

/**
 * Class CommentRepository
 */
class CommentRepository extends Repository {

    /**
     * Set Post entity
     *
     * @return mixed
     */
    public function entity() {
        return Comment::class;
    }

    /**
     * Find all comments
     *
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll($with = [], $length = 50) {
        // tables
        $comment_table = Comment::$tableName;

        $model = Comment::with($with);

        // paginate result
        return $model->select("$comment_table.*")->paginate($length);

    }
}