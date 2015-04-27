<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

  use \Dimsav\Translatable\Translatable;

  public $translatedAttributes = [
    'title',
    'teaser',
    'body',
  ];

  protected $fillable = [
    'title',
    'teaser',
    'body',
    'slug',
    'status',
  ];

  /**
   * Validation rules for this model
   */
  public $rules = [
  ];

}

class PageTranslation extends Model {

  public $timestamps = FALSE;

  protected $fillable = [
    'title',
    'teaser',
    'body',
    'slug',
    'status',
  ];

}