<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class WeeklyVoiceCall extends Command {

        /**
         * The console command name.
         *
         * @var string
         */
	protected $name = 'voicecall:weekly';

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

                //copy subscriber list for voice call processing
                $query1 = "insert ignore into motech_data_services.tmp_user (client_number,gender,age,education,channel,language,location,region,date,campaign,nyWeeks)
                select DISTINCT client_number,client_gender,client_age,client_education_level,channel,client_language,client_location,client_region,creationDate,campaignid,nyWeeks
                from motech_data_services.NYVRS_MODULE_CLIENTREGISTRATION  Where channel <> 'SMS' ";
                DB::statement($query1);

                // Update nyweeks and  set msg_file
                $query2 = "update motech_data_services.tmp_user set msg_file=concat(IF(campaign='KIKI', 'Set1', IF(campaign='RONALD' ,'Set2','Set3')) ,'Week',nyweeks+1), nyweeks=nyWeeks+1";
                DB::statement($query2);

                $url = "http://41.191.245.72/noyawagh/triggerSendVoice";
              //  file_get_contents($url);
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
                 //     array('example', InputArgument::REQUIRED, 'An example argument.'),
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
         //             array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
                );
        }

}