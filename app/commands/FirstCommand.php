<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FirstCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:active';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
		        $date = new DateTime();
                $date = $date->format("l jS \of F Y h:i:s A");
                echo "Execusion started @ " .$date . "\n";

                $time_start = microtime(true);

                //backup
                $query1 = "insert into special_no_yawa_users select * from tmp_user";
                //DB::statement($query1);

                // Update nyweeks and  set msg_file
                $query2 = "update tmp_user set msg_file=concat(IF(campaign='KIKI', 'Set1', IF(campaign='RONALD' ,'Set2','Set3')) ,'Week',nyweeks+1), nyweeks=nyweeks+1";
               // DB::statement($query2);

                $url = "http://41.191.245.72/noyawagh/triggerSendVoice";
                //file_get_contents($url);

                $c = curl_init($url);
                curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $c, CURLOPT_CUSTOMREQUEST, 'HEAD' );
				curl_setopt( $c, CURLOPT_HEADER, 1 );
				curl_setopt( $c, CURLOPT_NOBODY, true );

    		   curl_exec($c);

                echo 'Total execution time in seconds: ' . (microtime(true) - $time_start) . "\n";
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
