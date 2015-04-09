<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\AuthController;

class AdminController extends AuthController {

	public function __construct() {
//    parent::__construct();
  }

  public function index() {
    return view('admin.dashboard');
  }

}