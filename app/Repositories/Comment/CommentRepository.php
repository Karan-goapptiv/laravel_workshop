<?php

namespace App\Repositories\Comment;

use App\Models\Comment\Comment;

class CommentRepository {

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
    public function find($with = [], $length = 50) {
        $comment_table = Comment::$tableName;

        // paginate result
        return Comment::with($with)->select("$comment_table.*")->paginate($length);
    }

    /**
     * Find all comments for post
     *
     * @param $post_id
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findForPostId($post_id, $with = [], $length = 50) {
        $comment_table = Comment::$tableName;

        // filter for post
        $model = Comment::with($with)->where("$comment_table.post_id", $post_id);

        // paginate result
        return $model->select("$comment_table.*")->paginate($length);
    }
}