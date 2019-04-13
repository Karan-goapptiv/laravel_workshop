<?php

namespace App\Http\Controllers\api\v1\Comment;


use App\Http\Controllers\api\BaseApiController;
use App\Http\Requests\CreateCommentRequest;
use App\Http\RestResponse;
use App\Http\Services\AuthorizationService;
use App\Models\Comment\Comment;
use App\Services\Comment\CommentService;

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
     * Get all comments
     *
     * @param $post_id
     * @return mixed
     */
    public function forPost($post_id) {

        // fetch comments
        $comments = $this->commentService->findForPostId($post_id, [], $this->length);

        // return followUps in json format
        return RestResponse::done('comments', $comments);
    }

    /**
     * Create Comment
     *
     * @param CreateCommentRequest $request
     * @return mixed
     */
    public function create(CreateCommentRequest $request) {

        // prepare fields
        $fields = $request->getFields();
        $fields['user_id'] = $this->authService->user->id;

        // create
        $comment = Comment::create($fields);

        // response
        return RestResponse::done('comment', $comment);
    }
}