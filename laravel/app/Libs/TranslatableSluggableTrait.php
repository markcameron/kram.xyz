<?php namespace App\Libs;

trait TranslatableSluggableTrait {

	public static function getBySlug($slug) {
		$instance = new static;

		$config = config('sluggable');

    $result = \DB::table(strtolower(class_basename($instance) . '_translations'))
      ->where($config['save_to'], $slug)
      ->get();

    if (!$result) {
      return new Illuminate\Support\Collection();
    }

    return $instance->where('id', $result[0]->{strtolower(class_basename($instance) . '_id')})->get();
	}

  public static function findBySlug($slug) {
		return static::getBySlug($slug)->first();
	}

}