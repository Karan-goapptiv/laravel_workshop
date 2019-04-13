<?php

namespace App\Http\Controllers\api\v1\Post;


use App\Http\Controllers\api\BaseApiController;
use App\Http\Requests\CreatePostRequest;
use App\Http\RestResponse;
use App\Http\Services\AuthorizationService;
use App\Models\Post\Post;
use App\Services\Post\PostService;

class PostApiController extends BaseApiController {

    /**
     * Services
     */
    public $postService;
    public $authService;

    /**
     * Constructor.
     *
     * @param PostService $postService
     * @param AuthorizationService $authService
     */
    public function __construct(PostService $postService, AuthorizationService $authService) {
        parent::__construct();
        $this->postService = $postService;
        $this->authService = $authService;
    }

    /**
     * Get all posts
     *
     * @return mixed
     */
    public function index() {

        // fetch comments
        $post = $this->postService->find();

        // return followUps in json format
        return RestResponse::done('posts', $post);
    }

    /**
     * Get all posts
     *
     * @return mixed
     */
    public function byUser() {

        // fetch comments
        $post = $this->postService->findByUser($this->authService->user->id);

        // return followUps in json format
        return RestResponse::done('posts', $post);
    }

    /**
     * Create Post
     *
     * @param CreatePostRequest $request
     * @return mixed
     */
    public function create(CreatePostRequest $request) {
        // prepare fields
        $fields = $request->getFields();
        $fields['user_id'] = $this->authService->user->id;

        // create
        $post = Post::create($fields);

        // response
        return RestResponse::done('post', $post);
    }
}