<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('pages', function(Blueprint $table)
    {
      $table->increments('id');
      $table->timestamps();
    });

    Schema::create('page_translations', function(Blueprint $table)
    {
      $table->increments('id');
      $table->integer('page_id')->unsigned();
      $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
      $table->string('locale')->index();
      $table->unique(['page_id', 'locale']);

      $table->string('title');
      $table->text('teaser');
      $table->longText('body');
      $table->string('slug');
      $table->boolean('status')->default(TRUE);
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('page_translations');
		Schema::drop('pages');
	}
}
