<?php

namespace App\Events\Post;

use App\Models\Post\Post;
use Illuminate\Queue\SerializesModels;

class CommentCount {
    use SerializesModels;

    /**
     * @var Post
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post) {
        $this->post = $post;
    }
}