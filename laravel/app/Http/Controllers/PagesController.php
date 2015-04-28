<?php namespace App\Http\Controllers;

class PagesController extends Controller {

  /**
   * Display the specified page.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($page = false) {
    if (!$page) {
      return App::abort('404');
    }

    $media = $page->getMedia('image')->first();

    return view('front.pages.show', compact('page', 'media'));
  }

}
