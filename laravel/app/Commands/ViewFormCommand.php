<?php namespace App\Commands;

use Bpocallaghan\Generators\Commands\ViewCommand;

class ViewFormCommand extends ViewCommand
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:view:form';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new blade form view file';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'View_Form';

	/**
	 * Get the destination class path.
	 *
	 * @param  string $name
	 * @return string
	 */
	protected function getPath($name)
	{
		return './resources/views/' . str_replace('.', '/', $this->argument('name')) . '/partials/form.blade.php';
	}
}
