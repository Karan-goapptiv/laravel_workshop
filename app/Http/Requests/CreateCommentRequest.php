<?php

namespace App\Http\Requests;

use App\Models\Post\Post;
use Validator;

class CreateCommentRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Validation new follow up request
     *
     * @return array
     */
    public function rules() {
        $post_table = Post::$tableName;
        return [
            'comment' => array('required'),
            'post_id' => array('required', "exists:$post_table,id")
        ];
    }

    /**
     * Get fields
     *
     * @return array
     */
    public function getFields() {
        return [
            'comment' => $this->get('comment', ''),
            'post_id' => $this->get('post_id')
        ];
    }
}