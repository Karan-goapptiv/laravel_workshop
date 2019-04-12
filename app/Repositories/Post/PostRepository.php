<?php

namespace App\Repositories\Post;

use App\Library\NewRepositoriesPattern\Abstracts\Repository;
use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PostRepository
 */
class PostRepository extends Repository {

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
    public function findAll($with = [], $length = 50) {
        // tables
        $post_table = Post::$tableName;

        $model = Post::with($with);

        // paginate result
        return $model->select("$post_table.*")->paginate($length);
    }

    /**
     * Get record by id
     *
     * @param $id
     * @param $with
     * @return Model
     */
    public function getById($id, $with = []) {
        return Post::with($with)->find($id);
    }
}