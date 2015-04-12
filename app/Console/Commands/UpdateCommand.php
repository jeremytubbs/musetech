<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use App\Project;

use GrahamCampbell\GitHub\Facades\GitHub;

class UpdateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'musetech:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update github projects.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		Project::chunk(100, function($projects)
		{
			foreach ($projects as $project)
			{
				try
				{
					$repo = GitHub::repo()->show($project->owner, $project->name);
				}
				catch (\RuntimeException $e)
				{
					$error = $e->getMessage();
					$project->is_listed = 1;
					$project->save();
					$this->error($error);
				}

				if (isset($repo))
				{
					$updated = rtrim(str_replace(array('T', 'Z'), ' ', $repo['updated_at']));

					$project->github_url = $repo['html_url'];
					$project->name = $repo['name'];
					$project->owner = $repo['owner']['login'];
					$project->description = $repo['description'];
					$project->homepage = $repo['homepage'];
					$project->stars = $repo['stargazers_count'];
					$project->language = $repo['language'];
					$project->last_updated = $updated;
					$project->save();
					$this->message($repo['html_url'] . ' updated.');
				}
			}
		});
	}

}
