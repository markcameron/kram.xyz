<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;

use App\Http\Controllers\Admin\AdminController;

use Redirect;

use Illuminate\Http\Request;

class UsersController extends AdminController {

  /**
   * Display a listing of users.
   *
   * @return Response
   */
  public function index() {
    $user = User::orderBy('created_at', 'DESC')
      ->paginate(Variables::get('items_per_page'));

    return $this->view('admin.users.index')->with('user', $user);
  }

  /**
   * Show the form for creating a new user.
   *
   * @return Response
   */
  public function create() {
    return $this->view('admin.users.create');
  }

  /**
   * Store a newly created user in storage.
   *
   * @param Request $request
   * @return Response
   */
  public function store(Request $request) {
    $this->validate($request, User::$rules, User::$messages);

    $user = $this->createEntry('App\Models\User', $request->all());

    return Redirect::route('admin.users.index');
  }

  /**
   * Display the specified user.
   *
   * @param User $user
   * @return Response
   */
  public function show(User $user) {
    return $this->view('admin.users.show')->with('user', $user);
  }

  /**
   * Show the form for editing the specified user.
   *
   * @param User $user
   * @return Response
   */
  public function edit(User $user) {
    return $this->view('users.add_edit')->with('user', $user);
  }

  /**
   * Update the specified user in storage.
   *
   * @param User  $user
   * @param Request    $request
   * @return Response
   */
  public function update(User $user, Request $request) {
    $this->validate($request, User::$rules, User::$messages);

    $user = $this->updateEntry($user, $request->all());

    return Redirect::route('users.index');
  }

  /**
   * Remove the specified user from storage.
   *
   * @param User  $user
   * @param Request    $request
   * @return Response
   */
  public function destroy(User $user, Request $request) {
    $this->deleteEntry($user, $request);

    return Redirect::route('users.index');
  }

}
