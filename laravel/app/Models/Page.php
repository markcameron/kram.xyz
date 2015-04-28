<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Dimsav\Translatable\Translatable;
use App\Libs\TranslatableSluggableTrait;
use Devfactory\Media\MediaTrait;

class Page extends Model {

  use MediaTrait;
  use Translatable;
  use TranslatableSluggableTrait;

  public $translatedAttributes = [
    'title',
    'teaser',
    'body',
    'slug',
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

class PageTranslation extends Model implements SluggableInterface {

  use SluggableTrait;

  protected $sluggable = [
    'build_from' => 'title',
  ];

  public $timestamps = FALSE;

  protected $fillable = [
    'title',
    'teaser',
    'body',
    'slug',
    'status',
  ];

}