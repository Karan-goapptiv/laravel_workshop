<?php

namespace App\Http\Controllers\api\v1\Comment;


use App\Http\Controllers\api\BaseApiController;
use App\Http\Services\AuthorizationService;
use App\Library\NewRepositoriesPattern\RestResponse;
use App\Services\Comment\CommentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentApiController extends BaseApiController {

    /**
     * Services
     */
    public $commentService;
    public $authService;

    /**
     * CommentApiController constructor.
     * @param CommentService $commentService
     * @param AuthorizationService $authService
     */
    public function __construct(CommentService $commentService, AuthorizationService $authService) {
        parent::__construct();
        $this->commentService = $commentService;
        $this->authService = $authService;
    }

    /**
     * Get all comments
     *
     * @return mixed
     */
    public function index() {

        // fetch comments
        $comments = $this->commentService->findAll();

        // return followUps in json format
        return RestResponse::done('comments', $comments);
    }

    /**
     * Create Comment
     *
     * @param Request $request
     * @return mixed
     */
    public function createComment(Request $request) {

        $comment = null;
        if(isset($request)) {
            $comment = $this->commentService->store([
                "comment" => $request->get('comment'),
                "post_id" => $request->get('post_id'),
//                "user_id" => $this->authService->user->id,
                "user_id" => $request->get('user_id'),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }

        return RestResponse::done('comment', $comment);
    }
}