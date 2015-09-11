<?php namespace App\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use Bpocallaghan\Generators\Commands\GeneratorCommand;

class AdminResourceCommand extends GeneratorCommand
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:admin-resource';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new admin resource (model, views, controller, migration, seed)';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Resource';

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->resource = $this->getResourceOnly();
    $this->settings = config('generators.defaults');

		$this->callModel();
		$this->callView();
		$this->callController();
		$this->callMigration();
		$this->callSeed();
		$this->callMigrate();

		$this->info('All Done!');
		$this->info('Remember to add ' .
			"`Route::resource('" . $this->getCollectionName() . "', 'Admin\\" .
			$this->getResourceControllerName() . "');`" .
			' in the `app\\Http\\routes.php`');
	}

	/**
	 * Call the generate:model command
	 */
	private function callModel()
	{
		$name = $this->getModelName();

		if ($this->confirm("Create a $name model? [yes|no]"))
		{
			$this->callCommandFile('model');
		}
	}

	/**
	 * Call the generate:view command
	 */
	private function callView()
	{
		if ($this->confirm("Create crud views for the $this->resource resource? [yes|no]"))
		{
      $views = config('generators.resource_views');

			foreach ($views as $key => $name)
			{
				$resource = $this->argument('resource');
				if (str_contains($resource, '.'))
				{
					$resource = str_replace('.', '/', $resource);
				}

				$this->callCommandFile('view_admin', $this->getViewPath($resource), $key, ['--name' => $name]);
			}
		}
	}

	/**
	 * Call the generate:controller command
	 */
	private function callController()
	{
		$name = $this->getResourceControllerName();

		if ($this->confirm("Create a controller ($name) for the $this->resource resource? [yes|no]"))
		{
			$arg = $this->getArgumentResource();
			$name = studly_case(substr_replace($arg, str_plural($this->resource), strrpos($arg, $this->resource), strlen($this->resource)));

			$this->callCommandFile('controller_admin', $name);
		}
	}

	/**
	 * Call the generate:migration command
	 */
	private function callMigration()
	{
		$name = $this->getMigrationName($this->option('migration'));

		if ($this->confirm("Create a migration ($name) for the $this->resource resource? [yes|no]"))
		{
			$this->callCommand('migration', $name, [
				'--model'  => false,
				'--schema' => $this->option('schema')
			]);
		}
	}

	/**
	 * Call the generate:seed command
	 */
	private function callSeed()
	{
		$name = $this->getSeedName() . config('generators.settings.seed.postfix');

		if ($this->confirm("Create a seed ($name) for the $this->resource resource? [yes|no]"))
		{
			$this->callCommandFile('seed');
		}
	}

	/**
	 * Call the migrate command
	 */
	protected function callMigrate()
	{
		if ($this->confirm('Migrate the database? [yes|no]'))
		{
			$this->call('migrate');
		}
	}

	/**
	 * @param       $command
	 * @param       $name
	 * @param array $options
	 */
	private function callCommand($command, $name, $options = [])
	{
		$options = array_merge($options, [
			'name'    => $name,
			'--plain' => $this->option('plain'),
			'--force' => $this->option('force')
		]);

		$this->call('generate:' . $command, $options);
	}

	/**
	 * Call the generate:file command to generate the given file
	 *
	 * @param       $type
	 * @param null  $name
	 * @param null  $stub
	 * @param array $options
	 */
	private function callCommandFile($type, $name = null, $stub = null, $options = [])
	{
		$this->call('generate:file', array_merge($options, [
			'name'    => ($name ? $name : $this->argument('resource')),
			'--type'  => $type,
			'--force' => $this->optionForce(),
			'--plain' => $this->optionPlain(),
			'--stub'  => ($stub ? $stub : $this->optionStub()),
		]));
	}

	/**
	 * The resource argument
	 * Lowercase and singular each word
	 *
	 * @return array|mixed|string
	 */
	private function getArgumentResource()
	{
		$name = $this->argument('resource');
		if (str_contains($name, '/'))
		{
			$name = str_replace('/', '.', $name);
		}

		if (str_contains($name, '\\'))
		{
			$name = str_replace('\\', '.', $name);
		}

		// lowecase and singular
		$name = strtolower(str_singular($name));

		return $name;
	}

	/**
	 * If there are '.' in the name, get the last occurence
	 *
	 * @return string
	 */
	private function getResourceOnly()
	{
		$name = $this->getArgumentResource();
		if (! str_contains($name, '.'))
		{
			return $name;
		}

		return substr($name, strripos($name, '.') + 1);
	}

	/**
	 * Get the Controller name for the resource
	 *
	 * @return string
	 */
	private function getResourceControllerName()
	{
		return $this->getControllerName(str_plural($this->resource), false) . config('generators.settings.controller.postfix');
	}

	/**
	 * Get the name for the migration
	 *
	 * @param null $name
	 * @return string
	 */
	private function getMigrationName($name = null)
	{
		return 'create_' . str_plural($this->getResourceName($name)) . '_table';
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['resource', InputArgument::REQUIRED, 'The name of the resource being generated.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array_merge(parent::getOptions(), [
			['migration', null, InputOption::VALUE_OPTIONAL, 'Optional migration name', null],
			['schema', 's', InputOption::VALUE_OPTIONAL, 'Optional schema to be attached to the migration', null],
		]);
	}

}
