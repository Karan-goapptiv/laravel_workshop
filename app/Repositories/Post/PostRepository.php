<?php

namespace App\Repositories\Post;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Model;

class PostRepository {

    /**
     * Set Post entity
     *
     * @return mixed
     */
    public function entity() {
        return Post::class;
    }

    /**
     * Find all posts
     *
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function find($with = [], $length = 50) {
        // tables
        $post_table = Post::$tableName;

        $model = Post::with($with);

        // paginate result
        return $model->select("$post_table.*")->paginate($length);
    }

    /**
     * Find post by user
     *
     * @param $user_id
     * @param array $with
     * @param int $length
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findByUser($user_id, $with = [], $length = 50) {

        // tables
        $post_table = Post::$tableName;

        // filter by user
        $model = Post::with($with)
            ->where("$post_table.user_id", $user_id);

        // paginate result
        return $model->select("$post_table.*")->paginate($length);
    }

    /**
     * Get post by id
     *
     * @param $id
     * @param $with
     * @return Model
     */
    public function getById($id, $with = []) {
        return Post::with($with)->find($id);
    }
}