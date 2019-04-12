<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

/**
 * Class BaseController
 *
 * This is the Base call for all the Controller classes.
 * Every Controller class should extend this class
 *
 * @package App\Http\Controllers
 */
abstract class BaseController extends Controller {

    /**
     * page length
     *
     * @var
     */
    protected $length;

    /**
     * Base Api Controller constructor
     */
    public function __construct() {
        $this->setPageLength();
    }

    /**
     * get pagination length from get parameter
     */
    public function setPageLength() {
        $length = Input::get('length');
        if (!isset($length)) {
            $length = 50;
        }

        $this->length = $length;
    }
}
