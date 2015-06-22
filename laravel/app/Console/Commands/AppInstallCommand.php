<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AppInstallCommand extends Command {

  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'app:install';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Install the app, running migrations, seeds, etc...';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function fire() {
    $this->comment(' _______________             ');
    $this->comment('< Deploying app >            ');
    $this->comment(' ---------------             ');
    $this->comment('        \   ^__^             ');
    $this->comment('         \  (==)\_______     ');
    $this->comment('            (__)\       )\/\ ');
    $this->comment('                ||----w |    ');
    $this->comment('                ||     ||    ');

    // Run the Migrations
    $this->info('Running database migrations...');
    $this->call('migrate', ['--force' => true]);

    // DB seeding
    $this->info('Seeding the database...');
    $this->call('db:seed', ['--force' => true]);

    $this->info('Installation complete!');
  }

}
