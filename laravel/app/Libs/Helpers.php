<?php namespace App\Libs;

class Helpers {

  /**
   * Determine the language of the content being edited/created
   *
   * @return
   */
  public static function getLang() {
    $lang = \Input::get('lang');

    if (!is_null($lang)) {
      return $lang;
    }

    return \App::getLocale();
  }

  public static function getLangSelector() {
    $lang = Helpers::getLang();

    return view('admin.partials.lang_selector', compact('lang'));
  }

}