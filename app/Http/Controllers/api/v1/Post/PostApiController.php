<?php

namespace App\Http\Controllers\api\v1\Post;


use App\Http\Controllers\api\BaseApiController;
use App\Http\Services\AuthorizationService;
use App\Library\NewRepositoriesPattern\RestResponse;
use App\Services\Post\PostService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostApiController extends BaseApiController {

    /**
     * Services
     */
    public $postService;
    public $authService;

    /**
     * CommentApiController constructor.
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
        $post = $this->postService->findAll();

        // return followUps in json format
        return RestResponse::done('posts', $post);
    }

    /**
     * Create Post
     *
     * @param Request $request
     * @return mixed
     */
    public function createPost(Request $request) {

        $post = null;
        if(isset($request)) {
            $post = $this->postService->store([
                "title" => $request->get('title'),
                "description" => $request->get('description'),
//                "user_id" => $this->authService->user->id,
                "user_id" => $request->get('user_id'),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }

        return RestResponse::done('post', $post);
    }
}