<?php

namespace App\Http\Requests;


use App\Models\User\User;

class RegisterUserRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Validation new program request
     *
     * @return array
     */
    public function rules() {
        $user_table = User::$tableName;
        return [
            'name' => array('required'),
            'mobile' => array('required', 'digits:10', "unique:$user_table,mobile"),
            'email' => array('required', 'email', "unique:$user_table,email"),
            'password' => array('required')
        ];
    }
}