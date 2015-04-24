<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

	public function __construct() {
    $this->middleware('admin.verify');
  }

  public function index() {
    return view('admin.dashboard');
  }

}