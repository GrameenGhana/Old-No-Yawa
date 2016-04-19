<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SaturdaySMS extends Command {

        /**
         * The console command name.
         *
         * @var string
         */
	protected $name = 'saturdaysms:weekly';

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
                $query2 = "insert into motech_data_services.sms_no_sent  select c.client_number,m.msg, 0,c.campaignid,c.nyWeeks, null,m.id,null,now() from motech_data_services.NYVRS_MODULE_CLIENTREGISTRATION c inner join  motech_data_services.NYVRS_MODULE_SMSMESSAGE m  on m.week=c.nyWeeks and m.nyday='Saturday' and m.campaignid=c.campaignid where  (c.status='Completed')  and channel ='SMS' and c.nyWeeks between 0 and 38  and m.msg is not null order by c.nyWeeks asc ";
                DB::statement($query2);

                

                $url = "http://41.191.245.72/nymess/tc.php";
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