<?php

namespace App\Http\Requests;


use App\Models\User\User;

class MobileLoginRequest extends Request {

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
            'mobile' => array('required', 'digits:10', "exists:$user_table,mobile"),
            'password' => array('required')
        ];
    }
}