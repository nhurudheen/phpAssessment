<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() {
        return view( 'Pages.Index' );
    }

    public function signUp() {
        return view( 'Pages.SignUp' );
    }
}
