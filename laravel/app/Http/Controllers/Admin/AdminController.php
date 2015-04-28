<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Admin;

use Response;

class AdminController extends Controller {

	public function __construct() {
    $this->middleware('admin.verify');
  }

  public function getIndex() {
    return view('admin.dashboard');
  }

  /**
   * Toggles the status of a Model Object for the index tables in admin
   *
   * @param $model_name string
   *  The fully qualified model class name
   *
   * @param $content_id int
   *  The id of the model row to work on
   *
   * @return JSON
   *  HTML of the button
   */
  public function getChangeStatus($model_name, $content_id) {
    $model = '\App\Models\\' . $model_name;
//    $new_model_name = $model_name;
//    $class = new $new_model_name;
    $content = $model::find($content_id);

    if ($content->status) {
      $content->status = FALSE;
    }
    else {
      $content->status = TRUE;
    }

    $button = Admin::renderStatusButton($content, $model_name);

    $content->save();

    return Response::json(array('button' => (String) $button));
  }

}