<?php

namespace App\Listeners\Post;

use App\Services\Post\PostService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Validator;

class UpdateCommentCounts implements ShouldQueue {

    /**
     * @var PostService
     */
    public $postService;

    /**
     * @param $id
     * @param PostService $postService
     */
    public function handle($id, PostService $postService) {
        $this->postService = $postService;
        $patientProgramDocument = $this->postService->getById($id);
        $patientProgramDocument->fill([
            "no_of_comments" => $patientProgramDocument['no_of_comments'] + 1,
        ]);
        $patientProgramDocument->save();
    }
}