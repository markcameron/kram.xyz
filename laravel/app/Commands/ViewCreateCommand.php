<?php namespace App\Commands;

use Bpocallaghan\Generators\Commands\ViewCommand;

class ViewCreateCommand extends ViewCommand
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:view:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new blade create view file';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'View_Create';

	/**
	 * Get the destination class path.
	 *
	 * @param  string $name
	 * @return string
	 */
	protected function getPath($name)
	{
		return './resources/views/' . str_replace('.', '/', $this->argument('name')) . '/create.blade.php';
	}
}
