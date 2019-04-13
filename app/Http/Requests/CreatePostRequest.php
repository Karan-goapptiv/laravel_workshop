<?php

namespace App\Http\Requests;

use Validator;

class CreatePostRequest extends Request {

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
        return [
            'title' => array('required'),
            'description' => array('required')
        ];
    }

    /**
     * Get fields
     *
     * @return array
     */
    public function getFields() {
        return [
            'title' => $this->get('title', ''),
            'description' => $this->get('description', ''),
        ];
    }
}