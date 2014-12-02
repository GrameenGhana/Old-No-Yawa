<?php

class StatsController extends BaseController {

    public function showGeneralChart() {

        
        //Charts
        
        //getting chart array of subscribers by age
        $subscribersByAge = $this->getSubscribersByAgeChart();
        $subscribersByChannel = $this->getSubscribersByChannelChart();
        $subscribersByOperator = $this->getSubscribersByOperatorChart();
        

        $data = array("subscribersByAge"=>$subscribersByAge,"subscribersByChannel"=>$subscribersByChannel,"subscribersByOperator"=>$subscribersByOperator);
        
        return View::make('stats/generalcharts')->with($data);
    }
    
    

    public function getSubscribersByAgeChart() {
        $sqlmale = ' and client_gender = "m" ';
        $sqlfemale = ' and client_gender = "f" ';
        $sqljhs = ' and client_education_level="jhs"';
        $sqlshs = ' and client_education_level="shs"';
        $sqlter = ' and client_education_level="ter"';
        $sqlna = ' and client_education_level="na"';


        
        //Subscribers between 0-14 yrs
        $sql014 = ' client_age >= 0 and client_age <=14 ';
//        $subscribers014 = DB::table('clients_sms_registration')
//                ->whereRaw($sql014)
//                ->count();
        
        $subscribers014 = DB::table('clients_sms_registration')
                ->whereRaw($sql014 )
                ->count();

        //Male Subscribers between 0-14 yrs
        $subscribers014male = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers between 0-14 yrs in Jhs
        $subscribers014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers between 0-14 yrs in Shs
        $subscribers014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers between 0-14 yrs in Tertiary
        $subscribers014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers between 0-14 yrs not in school
        $subscribers014malena = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers between 0-14 yrs
        $subscribers014female = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers between 0-14 yrs in Jhs
        $subscribers014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers between 0-14 yrs in Shs
        $subscribers014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers between 0-14 yrs in Tertiary
        $subscribers014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers between 0-14 yrs not in school
        $subscribers014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers between 15-19 yrs
        $sql1519 = ' client_age >= 15 and client_age <=19 ';
        $subscribers1519 = DB::table('clients_sms_registration')
                ->whereRaw($sql1519)
                ->count();

        //Male Subscribers between 15-19 yrs
        $subscribers1519male = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers between 15-19 yrs in Jhs
        $subscribers1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers between 15-19 yrs in Shs
        $subscribers1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers between 15-19 yrs in Tertiary
        $subscribers1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers between 15-19 yrs not in school
        $subscribers1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers between 15-19 yrs
        $subscribers1519female = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers between 15-19 yrs in Jhs
        $subscribers1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers between 15-19 yrs in Shs
        $subscribers1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers between 15-19 yrs in Tertiary
        $subscribers1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers between 15-19 yrs not in school
        $subscribers1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers between 20-24 yrs 
        $sql2024 = ' client_age >= 20 and client_age <=24 ';
        $subscribers2024 = DB::table('clients_sms_registration')
                ->whereRaw($sql2024)
                ->count();

        //Male Subscribers between 20-24 yrs
        $subscribers2024male = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers between 20-24 yrs in Jhs
        $subscribers2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers between 20-24 yrs in Shs
        $subscribers2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers between 20-24 yrs in Tertiary
        $subscribers2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers between 20-24 yrs not in school
        $subscribers2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers between 20-24 yrs
        $subscribers2024female = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers between 20-24 yrs in Jhs
        $subscribers2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers between 20-24 yrs in Shs
        $subscribers2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers between 20-24 yrs in Tertiary
        $subscribers2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers between 20-24 yrs not in school
        $subscribers2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers between 25+ yrs 
        $sql25 = ' client_age >= 25  ';
        $subscribers25 = DB::table('clients_sms_registration')
                ->whereRaw($sql25)
                ->count();

        //Male Subscribers between 25+ yrs
        $subscribers25male = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers between 25+ yrs in Jhs
        $subscribers25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers between 25+ yrs in Shs
        $subscribers25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers between 25+ yrs in Tertiary
        $subscribers25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers between 25+ yrs not in school
        $subscribers25malena = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers between 25+ yrs
        $subscribers25female = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers between 25+ yrs in Jhs
        $subscribers25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers between 25+ yrs in Shs
        $subscribers25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers between 25+ yrs in Tertiary
        $subscribers25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers between 25+ yrs not in school
        $subscribers25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        $chartArray["chart"] = array("type" => "column");
        $chartArray["title"] = array("text" => "NoYawa Registrants By Age");
        $chartArray["subtitle"] = array("text" => "Click the slices to view more breakdowns");
        $chartArray["xAxis"] = array("type" => "category");
        $chartArray["legend"] = array("enabled" => true);
        $chartArray["credits"] = array("enabled" => false);
        //$chartArray["tooltip"] = array("pointFormat" => "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>","headerFormat"=>"<span style='font-size:11px'>{series.name}</span><br>");
        $chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)));
        $chartArray["series"][] = array("type" => "pie", 'name' => "Age Ranges", "colorByPoint" => true, "data" => [array("name" => "0-14 yrs", "y" => $subscribers014, "drilldown" => "age014"), array("name" => "15-19 yrs", "y" => $subscribers1519, "drilldown" => "age1519"),
                array("name" => "20-24 yrs", "y" => $subscribers2024, "drilldown" => "age2024"), array("name" => "25+ yrs", "y" => $subscribers25, "drilldown" => "age25")]);
        $chartArray["drilldown"] = array("series" => [
                
            array("id" => "age014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribers014male, "drilldown" => "maleage014"), array("name" => "Female", "y" => $subscribers014female, "drilldown" => "femaleage014")]),
                array("name" => "Education Level", "id" => "maleage014", "data" => [['JHS', $subscribers014malejhs], ['SHS', $subscribers014maleshs], ['Tertiary', $subscribers014maleter], ["Not In School", $subscribers014malena]]),
                array("name" => "Education Level", "id" => "femaleage014", "data" => [['JHS', $subscribers014femalejhs], ['SHS', $subscribers014femaleshs], ['Tertiary', $subscribers014femaleter], ["Not In School", $subscribers014femalena]]),
                
            array("id" => "age1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribers1519male, "drilldown" => "maleage1519"), array("name" => "Female", "y" => $subscribers1519female, "drilldown" => "femaleage1519")]),
                array("name" => "Education Level", "id" => "maleage1519", "data" => [['JHS', $subscribers1519malejhs], ['SHS', $subscribers1519maleshs], ['Tertiary', $subscribers1519maleter], ["Not In School", $subscribers1519malena]]),
                array("name" => "Education Level", "id" => "femaleage1519", "data" => [['JHS', $subscribers1519femalejhs], ['SHS', $subscribers1519femaleshs], ['Tertiary', $subscribers1519femaleter], ["Not In School", $subscribers1519femalena]]),
                
            array("id" => "age2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribers2024male, "drilldown" => "maleage2024"), array("name" => "Female", "y" => $subscribers2024female, "drilldown" => "femaleage2024")]),
                array("name" => "Education Level", "id" => "maleage2024", "data" => [['JHS', $subscribers2024malejhs], ['SHS', $subscribers2024maleshs], ['Tertiary', $subscribers2024maleter], ["Not In School", $subscribers2024malena]]),
                array("name" => "Education Level", "id" => "femaleage2024", "data" => [['JHS', $subscribers2024femalejhs], ['SHS', $subscribers2024femaleshs], ['Tertiary', $subscribers2024femaleter], ["Not In School", $subscribers2024femalena]]),
                
            array("id" => "age25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribers25male, "drilldown" => "maleage25"), array("name" => "Female", "y" => $subscribers25female, "drilldown" => "femaleage25")]),
                array("name" => "Education Level", "id" => "maleage25", "data" => [['JHS', $subscribers25malejhs], ['SHS', $subscribers25maleshs], ['Tertiary', $subscribers25maleter], ["Not In School", $subscribers25malena]]),
                array("name" => "Education Level", "id" => "femaleage25", "data" => [['JHS', $subscribers25femalejhs], ['SHS', $subscribers25femaleshs], ['Tertiary', $subscribers25femaleter], ["Not In School", $subscribers25femalena]])]);

        return $chartArray;
    }
    
    public function getSubscribersByChannelChart() {
        
        //queries for age groups
        $sql014 = ' and client_age >= 0 and client_age <=14 ';
        $sql1519 = ' and client_age >= 15 and client_age <=19 ';
        $sql2024 = ' and client_age >= 20 and client_age <=24 ';
        $sql25 = ' and client_age >= 25  ';
        
        //queries for gender
        $sqlmale = ' and client_gender = "m" ';
        $sqlfemale = ' and client_gender = "f" ';
        
        //queries for education levels
        $sqljhs = ' and client_education_level="jhs"';
        $sqlshs = ' and client_education_level="shs"';
        $sqlter = ' and client_education_level="ter"';
        $sqlna = ' and client_education_level="na"';


        //Subscribers registered with sms channel
        $sqlsms = ' channel = "sms" ';
        $subscribersSms = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms)
                ->count();
        
        //Subscribers registered with sms channel and between 0-14 yrs
        $subscribersSms014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014)
                ->count();

        //Male Subscribers registered with sms channel and between 0-14 yrs
        $subscribersSms014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with sms channel and between 0-14 yrs in Jhs
        $subscribersSms014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with sms channel and between 0-14 yrs in Shs
        $subscribersSms014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with sms channel and between 0-14 yrs in Tertiary
        $subscribersSms014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with sms channel and between 0-14 yrs not in school
        $subscribersSms014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with sms channel and between 0-14 yrs
        $subscribersSms014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with sms channel and between 0-14 yrs in Jhs
        $subscribersSms014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with sms channel and between 0-14 yrs in Shs
        $subscribersSms014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with sms channel and between 0-14 yrs in Tertiary
        $subscribersSms014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with sms channel and between 0-14 yrs not in school
        $subscribersSms014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with sms channel and between 15-19 yrs
        $subscribersSms1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519)
                ->count();

        //Male Subscribers registered with sms channel and between 15-19 yrs
        $subscribersSms1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with sms channel and between 15-19 yrs in Jhs
        $subscribersSms1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with sms channel and between 15-19 yrs in Shs
        $subscribersSms1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with sms channel and between 15-19 yrs in Tertiary
        $subscribersSms1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with sms channel and between 15-19 yrs not in school
        $subscribersSms1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with sms channel and between 15-19 yrs
        $subscribersSms1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with sms channel and between 15-19 yrs in Jhs
        $subscribersSms1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with sms channel and between 15-19 yrs in Shs
        $subscribersSms1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with sms channel and between 15-19 yrs in Tertiary
        $subscribersSms1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with sms channel and between 15-19 yrs not in school
        $subscribersSms1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with sms channel and between 20-24 yrs 
        $subscribersSms2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024)
                ->count();

        //Male Subscribers registered with sms channel and between 20-24 yrs
        $subscribersSms2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with sms channel and between 20-24 yrs in Jhs
        $subscribersSms2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with sms channel and between 20-24 yrs in Shs
        $subscribersSms2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with sms channel and between 20-24 yrs in Tertiary
        $subscribersSms2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with sms channel and between 20-24 yrs not in school
        $subscribersSms2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with sms channel and between 20-24 yrs
        $subscribersSms2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with sms channel and between 20-24 yrs in Jhs
        $subscribersSms2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with sms channel and between 20-24 yrs in Shs
        $subscribersSms2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with sms channel and between 20-24 yrs in Tertiary
        $subscribersSms2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with sms channel and between 20-24 yrs not in school
        $subscribersSms2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with sms channel and between 25+ yrs 
        $subscribersSms25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25)
                ->count();

        //Male Subscribers registered with sms channel and between 25+ yrs
        $subscribersSms25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with sms channel and between 25+ yrs in Jhs
        $subscribersSms25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with sms channel and between 25+ yrs in Shs
        $subscribersSms25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with sms channel and between 25+ yrs in Tertiary
        $subscribersSms25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with sms channel and between 25+ yrs not in school
        $subscribersSms25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with sms channel and between 25+ yrs
        $subscribersSms25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with sms channel and between 25+ yrs in Jhs
        $subscribersSms25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with sms channel and between 25+ yrs in Shs
        $subscribersSms25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with sms channel and between 25+ yrs in Tertiary
        $subscribersSms25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with sms channel and between 25+ yrs not in school
        $subscribersSms25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlsms." ".$sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();
        
        //Next Criteria : voice channel
        
        //Subscribers registered with voice channel
        $sqlvoice = ' channel = "voice" ';
        $subscribersVoice = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice)
                ->count();
        
        //Subscribers registered with voice channel and between 0-14 yrs
        $subscribersVoice014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014)
                ->count();

        //Male Subscribers registered with voice channel and between 0-14 yrs
        $subscribersVoice014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with voice channel and between 0-14 yrs in Jhs
        $subscribersVoice014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with voice channel and between 0-14 yrs in Shs
        $subscribersVoice014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with voice channel and between 0-14 yrs in Tertiary
        $subscribersVoice014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with voice channel and between 0-14 yrs not in school
        $subscribersVoice014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with voice channel and between 0-14 yrs
        $subscribersVoice014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with voice channel and between 0-14 yrs in Jhs
        $subscribersVoice014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with voice channel and between 0-14 yrs in Shs
        $subscribersVoice014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with voice channel and between 0-14 yrs in Tertiary
        $subscribersVoice014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with voice channel and between 0-14 yrs not in school
        $subscribersVoice014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with voice channel and between 15-19 yrs
        $subscribersVoice1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519)
                ->count();

        //Male Subscribers registered with voice channel and between 15-19 yrs
        $subscribersVoice1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with voice channel and between 15-19 yrs in Jhs
        $subscribersVoice1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with voice channel and between 15-19 yrs in Shs
        $subscribersVoice1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with voice channel and between 15-19 yrs in Tertiary
        $subscribersVoice1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with voice channel and between 15-19 yrs not in school
        $subscribersVoice1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with voice channel and between 15-19 yrs
        $subscribersVoice1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with voice channel and between 15-19 yrs in Jhs
        $subscribersVoice1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with voice channel and between 15-19 yrs in Shs
        $subscribersVoice1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with voice channel and between 15-19 yrs in Tertiary
        $subscribersVoice1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with voice channel and between 15-19 yrs not in school
        $subscribersVoice1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with voice channel and between 20-24 yrs 
        $subscribersVoice2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024)
                ->count();

        //Male Subscribers registered with voice channel and between 20-24 yrs
        $subscribersVoice2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with voice channel and between 20-24 yrs in Jhs
        $subscribersVoice2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with voice channel and between 20-24 yrs in Shs
        $subscribersVoice2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with voice channel and between 20-24 yrs in Tertiary
        $subscribersVoice2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with voice channel and between 20-24 yrs not in school
        $subscribersVoice2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with voice channel and between 20-24 yrs
        $subscribersVoice2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with voice channel and between 20-24 yrs in Jhs
        $subscribersVoice2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with voice channel and between 20-24 yrs in Shs
        $subscribersVoice2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with voice channel and between 20-24 yrs in Tertiary
        $subscribersVoice2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with voice channel and between 20-24 yrs not in school
        $subscribersVoice2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with voice channel and between 25+ yrs 
        $subscribersVoice25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25)
                ->count();

        //Male Subscribers registered with voice channel and between 25+ yrs
        $subscribersVoice25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with voice channel and between 25+ yrs in Jhs
        $subscribersVoice25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with voice channel and between 25+ yrs in Shs
        $subscribersVoice25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with voice channel and between 25+ yrs in Tertiary
        $subscribersVoice25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with voice channel and between 25+ yrs not in school
        $subscribersVoice25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with voice channel and between 25+ yrs
        $subscribersVoice25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with voice channel and between 25+ yrs in Jhs
        $subscribersVoice25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with voice channel and between 25+ yrs in Shs
        $subscribersVoice25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with sms channel and between 25+ yrs in Tertiary
        $subscribersVoice25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with voice channel and between 25+ yrs not in school
        $subscribersVoice25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice." ".$sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();


        $chartArray["chart"] = array("type" => "column");
        $chartArray["title"] = array("text" => "NoYawa Registrants By Channel");
        $chartArray["subtitle"] = array("text" => "Click the slices to view more breakdowns");
        $chartArray["xAxis"] = array("type" => "category");
        $chartArray["legend"] = array("enabled" => true,"layout"=>"vertical","align"=>"right","verticalAlign"=>"top");
        $chartArray["credits"] = array("enabled" => false);
        //$chartArray["tooltip"] = array("pointFormat" => "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>","headerFormat"=>"<span style='font-size:11px'>{series.name}</span><br>");
        $chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)));
        $chartArray["series"][] = array("type" => "pie", 'name' => "Channels", "colorByPoint" => true, "data" => [array("name" => "SMS", "y" => $subscribersSms, "drilldown" => "channelSms"), 
                array("name" => "Voice", "y" => $subscribersVoice, "drilldown" => "channelVoice")]);
        $chartArray["drilldown"] = array("series" => [
                
            array("id" => "channelSms", "name" => "SMS : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersSms014, "drilldown" => "smsage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersSms1519, "drilldown" => "smsage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersSms2024, "drilldown" => "smsage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersSms25, "drilldown" => "smsage25")]),
            
            array("id" => "smsage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersSms014male, "drilldown" => "smsmaleage014"), array("name" => "Female", "y" => $subscribersSms014female, "drilldown" => "smsfemaleage014")]),
                array("name" => "Education Level", "id" => "smsmaleage014", "data" => [['JHS', $subscribersSms014malejhs], ['SHS', $subscribersSms014maleshs], ['Tertiary', $subscribersSms014maleter], ["Not In School", $subscribersSms014malena]]),
                array("name" => "Education Level", "id" => "smsfemaleage014", "data" => [['JHS', $subscribersSms014femalejhs], ['SHS', $subscribersSms014femaleshs], ['Tertiary', $subscribersSms014femaleter], ["Not In School", $subscribersSms014femalena]]),
                
            array("id" => "smsage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersSms1519male, "drilldown" => "smsmaleage1519"), array("name" => "Female", "y" => $subscribersSms1519female, "drilldown" => "smsfemaleage1519")]),
                array("name" => "Education Level", "id" => "smsmaleage1519", "data" => [['JHS', $subscribersSms1519malejhs], ['SHS', $subscribersSms1519maleshs], ['Tertiary', $subscribersSms1519maleter], ["Not In School", $subscribersSms1519malena]]),
                array("name" => "Education Level", "id" => "smsfemaleage1519", "data" => [['JHS', $subscribersSms1519femalejhs], ['SHS', $subscribersSms1519femaleshs], ['Tertiary', $subscribersSms1519femaleter], ["Not In School", $subscribersSms1519femalena]]),
                
            array("id" => "smsage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersSms2024male, "drilldown" => "smsmaleage2024"), array("name" => "Female", "y" => $subscribersSms2024female, "drilldown" => "smsfemaleage2024")]),
                array("name" => "Education Level", "id" => "smsmaleage2024", "data" => [['JHS', $subscribersSms2024malejhs], ['SHS', $subscribersSms2024maleshs], ['Tertiary', $subscribersSms2024maleter], ["Not In School", $subscribersSms2024malena]]),
                array("name" => "Education Level", "id" => "smsfemaleage2024", "data" => [['JHS', $subscribersSms2024femalejhs], ['SHS', $subscribersSms2024femaleshs], ['Tertiary', $subscribersSms2024femaleter], ["Not In School", $subscribersSms2024femalena]]),
                
            array("id" => "smsage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersSms25male, "drilldown" => "smsmaleage25"), array("name" => "Female", "y" => $subscribersSms25female, "drilldown" => "smsfemaleage25")]),
                array("name" => "Education Level", "id" => "smsmaleage25", "data" => [['JHS', $subscribersSms25malejhs], ['SHS', $subscribersSms25maleshs], ['Tertiary', $subscribersSms25maleter], ["Not In School", $subscribersSms25malena]]),
                array("name" => "Education Level", "id" => "smsfemaleage25", "data" => [['JHS', $subscribersSms25femalejhs], ['SHS', $subscribersSms25femaleshs], ['Tertiary', $subscribersSms25femaleter], ["Not In School", $subscribersSms25femalena]]),
            
            array("id" => "channelVoice", "name" => "Voice : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersVoice014, "drilldown" => "voiceage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersVoice1519, "drilldown" => "voiceage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersVoice2024, "drilldown" => "voiceage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersVoice25, "drilldown" => "voiceage25")]),
            
            array("id" => "voiceage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersVoice014male, "drilldown" => "voicemaleage014"), array("name" => "Female", "y" => $subscribersVoice014female, "drilldown" => "voicefemaleage014")]),
                array("name" => "Education Level", "id" => "voicemaleage014", "data" => [['JHS', $subscribersVoice014malejhs], ['SHS', $subscribersVoice014maleshs], ['Tertiary', $subscribersVoice014maleter], ["Not In School", $subscribersVoice014malena]]),
                array("name" => "Education Level", "id" => "voicefemaleage014", "data" => [['JHS', $subscribersVoice014femalejhs], ['SHS', $subscribersVoice014femaleshs], ['Tertiary', $subscribersVoice014femaleter], ["Not In School", $subscribersVoice014femalena]]),
                
            array("id" => "voiceage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersVoice1519male, "drilldown" => "voicemaleage1519"), array("name" => "Female", "y" => $subscribersVoice1519female, "drilldown" => "voicefemaleage1519")]),
                array("name" => "Education Level", "id" => "voicemaleage1519", "data" => [['JHS', $subscribersVoice1519malejhs], ['SHS', $subscribersVoice1519maleshs], ['Tertiary', $subscribersVoice1519maleter], ["Not In School", $subscribersVoice1519malena]]),
                array("name" => "Education Level", "id" => "voicefemaleage1519", "data" => [['JHS', $subscribersVoice1519femalejhs], ['SHS', $subscribersVoice1519femaleshs], ['Tertiary', $subscribersVoice1519femaleter], ["Not In School", $subscribersVoice1519femalena]]),
                
            array("id" => "voiceage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersVoice2024male, "drilldown" => "voicemaleage2024"), array("name" => "Female", "y" => $subscribersVoice2024female, "drilldown" => "voicefemaleage2024")]),
                array("name" => "Education Level", "id" => "voicemaleage2024", "data" => [['JHS', $subscribersVoice2024malejhs], ['SHS', $subscribersVoice2024maleshs], ['Tertiary', $subscribersVoice2024maleter], ["Not In School", $subscribersVoice2024malena]]),
                array("name" => "Education Level", "id" => "voicefemaleage2024", "data" => [['JHS', $subscribersVoice2024femalejhs], ['SHS', $subscribersVoice2024femaleshs], ['Tertiary', $subscribersVoice2024femaleter], ["Not In School", $subscribersVoice2024femalena]]),
                
            array("id" => "voiceage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersVoice25male, "drilldown" => "voicemaleage25"), array("name" => "Female", "y" => $subscribersVoice25female, "drilldown" => "voicefemaleage25")]),
                array("name" => "Education Level", "id" => "voicemaleage25", "data" => [['JHS', $subscribersVoice25malejhs], ['SHS', $subscribersVoice25maleshs], ['Tertiary', $subscribersVoice25maleter], ["Not In School", $subscribersVoice25malena]]),
                array("name" => "Education Level", "id" => "voicefemaleage25", "data" => [['JHS', $subscribersVoice25femalejhs], ['SHS', $subscribersVoice25femaleshs], ['Tertiary', $subscribersVoice25femaleter], ["Not In School", $subscribersVoice25femalena]])
            
            
            ]);
        
        return $chartArray;
    }

    public function getSubscribersByOperatorChart() {
        
        //queries for age groups
        $sql014 = ' and client_age >= 0 and client_age <=14 ';
        $sql1519 = ' and client_age >= 15 and client_age <=19 ';
        $sql2024 = ' and client_age >= 20 and client_age <=24 ';
        $sql25 = ' and client_age >= 25  ';
        
        //queries for gender
        $sqlmale = ' and client_gender = "m" ';
        $sqlfemale = ' and client_gender = "f" ';
        
        //queries for education levels
        $sqljhs = ' and client_education_level="jhs"';
        $sqlshs = ' and client_education_level="shs"';
        $sqlter = ' and client_education_level="ter"';
        $sqlna = ' and client_education_level="na"';

         //Subscribers with MTN phone number
        $mtnC = array("54", "24", "55");
        $sqlMtn = " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $mtnC)) . "') ";
        $subscribersMtn = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn)
                ->count();


        //Subscribers registered with Mtn phone number and between 0-14 yrs
        $subscribersMtn014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 0-14 yrs
        $subscribersMtn014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 0-14 yrs in Jhs
        $subscribersMtn014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 0-14 yrs in Shs
        $subscribersMtn014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 0-14 yrs in Tertiary
        $subscribersMtn014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 0-14 yrs not in school
        $subscribersMtn014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 0-14 yrs
        $subscribersMtn014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 0-14 yrs in Jhs
        $subscribersMtn014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 0-14 yrs in Shs
        $subscribersMtn014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 0-14 yrs in Tertiary
        $subscribersMtn014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 0-14 yrs not in school
        $subscribersMtn014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Mtn phone number and between 15-19 yrs
        $subscribersMtn1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 15-19 yrs
        $subscribersMtn1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 15-19 yrs in Jhs
        $subscribersMtn1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 15-19 yrs in Shs
        $subscribersMtn1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 15-19 yrs in Tertiary
        $subscribersMtn1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 15-19 yrs not in school
        $subscribersMtn1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 15-19 yrs
        $subscribersMtn1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 15-19 yrs in Jhs
        $subscribersMtn1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 15-19 yrs in Shs
        $subscribersMtn1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 15-19 yrs in Tertiary
        $subscribersMtn1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 15-19 yrs not in school
        $subscribersMtn1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Mtn phone number and between 20-24 yrs 
        $subscribersMtn2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 20-24 yrs
        $subscribersMtn2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 20-24 yrs in Jhs
        $subscribersMtn2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 20-24 yrs in Shs
        $subscribersMtn2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 20-24 yrs in Tertiary
        $subscribersMtn2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 20-24 yrs not in school
        $subscribersMtn2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 20-24 yrs
        $subscribersMtn2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 20-24 yrs in Jhs
        $subscribersMtn2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 20-24 yrs in Shs
        $subscribersMtn2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 20-24 yrs in Tertiary
        $subscribersMtn2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 20-24 yrs not in school
        $subscribersMtn2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Mtn phone number and between 25+ yrs 
        $subscribersMtn25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 25+ yrs
        $subscribersMtn25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 25+ yrs in Jhs
        $subscribersMtn25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 25+ yrs in Shs
        $subscribersMtn25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 25+ yrs in Tertiary
        $subscribersMtn25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Mtn phone number and between 25+ yrs not in school
        $subscribersMtn25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 25+ yrs
        $subscribersMtn25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 25+ yrs in Jhs
        $subscribersMtn25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 25+ yrs in Shs
        $subscribersMtn25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 25+ yrs in Tertiary
        $subscribersMtn25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Mtn phone number and between 25+ yrs not in school
        $subscribersMtn25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMtn . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();


        //Next Network Operator : Tigo
        //Subscribers with Tigo phone number
        $tigoC = array("27", "57");
        $sqlTigo = " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $tigoC)) . "') ";
        $subscribersTigo = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo)
                ->count();


        //Subscribers registered with Tigo phone number and between 0-14 yrs
        $subscribersTigo014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 0-14 yrs
        $subscribersTigo014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 0-14 yrs in Jhs
        $subscribersTigo014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 0-14 yrs in Shs
        $subscribersTigo014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 0-14 yrs in Tertiary
        $subscribersTigo014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 0-14 yrs not in school
        $subscribersTigo014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 0-14 yrs
        $subscribersTigo014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 0-14 yrs in Jhs
        $subscribersTigo014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 0-14 yrs in Shs
        $subscribersTigo014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 0-14 yrs in Tertiary
        $subscribersTigo014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 0-14 yrs not in school
        $subscribersTigo014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Tigo phone number and between 15-19 yrs
        $subscribersTigo1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 15-19 yrs
        $subscribersTigo1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 15-19 yrs in Jhs
        $subscribersTigo1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 15-19 yrs in Shs
        $subscribersTigo1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 15-19 yrs in Tertiary
        $subscribersTigo1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 15-19 yrs not in school
        $subscribersTigo1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 15-19 yrs
        $subscribersTigo1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 15-19 yrs in Jhs
        $subscribersTigo1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 15-19 yrs in Shs
        $subscribersTigo1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 15-19 yrs in Tertiary
        $subscribersTigo1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 15-19 yrs not in school
        $subscribersTigo1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Tigo phone number and between 20-24 yrs 
        $subscribersTigo2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 20-24 yrs
        $subscribersTigo2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 20-24 yrs in Jhs
        $subscribersTigo2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 20-24 yrs in Shs
        $subscribersTigo2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 20-24 yrs in Tertiary
        $subscribersTigo2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 20-24 yrs not in school
        $subscribersTigo2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 20-24 yrs
        $subscribersTigo2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 20-24 yrs in Jhs
        $subscribersTigo2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 20-24 yrs in Shs
        $subscribersTigo2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 20-24 yrs in Tertiary
        $subscribersTigo2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 20-24 yrs not in school
        $subscribersTigo2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Tigo phone number and between 25+ yrs 
        $subscribersTigo25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 25+ yrs
        $subscribersTigo25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 25+ yrs in Jhs
        $subscribersTigo25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 25+ yrs in Shs
        $subscribersTigo25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 25+ yrs in Tertiary
        $subscribersTigo25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Tigo phone number and between 25+ yrs not in school
        $subscribersTigo25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 25+ yrs
        $subscribersTigo25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 25+ yrs in Jhs
        $subscribersTigo25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 25+ yrs in Shs
        $subscribersTigo25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 25+ yrs in Tertiary
        $subscribersTigo25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Tigo phone number and between 25+ yrs not in school
        $subscribersTigo25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlTigo . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Next Network Operator : Vodafone
        //Subscribers with Vodafone phone number
        $vodaC = array("50", "20");
        $sqlVodafone = " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $vodaC)) . "') ";
        $subscribersVodafone = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone)
                ->count();


        //Subscribers registered with Vodafone phone number and between 0-14 yrs
        $subscribersVodafone014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 0-14 yrs
        $subscribersVodafone014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 0-14 yrs in Jhs
        $subscribersVodafone014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 0-14 yrs in Shs
        $subscribersVodafone014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 0-14 yrs in Tertiary
        $subscribersVodafone014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 0-14 yrs not in school
        $subscribersVodafone014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 0-14 yrs
        $subscribersVodafone014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 0-14 yrs in Jhs
        $subscribersVodafone014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 0-14 yrs in Shs
        $subscribersVodafone014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 0-14 yrs in Tertiary
        $subscribersVodafone014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 0-14 yrs not in school
        $subscribersVodafone014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Vodafone phone number and between 15-19 yrs
        $subscribersVodafone1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 15-19 yrs
        $subscribersVodafone1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 15-19 yrs in Jhs
        $subscribersVodafone1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 15-19 yrs in Shs
        $subscribersVodafone1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 15-19 yrs in Tertiary
        $subscribersVodafone1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 15-19 yrs not in school
        $subscribersVodafone1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 15-19 yrs
        $subscribersVodafone1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 15-19 yrs in Jhs
        $subscribersVodafone1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 15-19 yrs in Shs
        $subscribersVodafone1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 15-19 yrs in Tertiary
        $subscribersVodafone1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 15-19 yrs not in school
        $subscribersVodafone1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Vodafone phone number and between 20-24 yrs 
        $subscribersVodafone2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 20-24 yrs
        $subscribersVodafone2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 20-24 yrs in Jhs
        $subscribersVodafone2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 20-24 yrs in Shs
        $subscribersVodafone2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 20-24 yrs in Tertiary
        $subscribersVodafone2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 20-24 yrs not in school
        $subscribersVodafone2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 20-24 yrs
        $subscribersVodafone2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 20-24 yrs in Jhs
        $subscribersVodafone2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 20-24 yrs in Shs
        $subscribersVodafone2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 20-24 yrs in Tertiary
        $subscribersVodafone2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 20-24 yrs not in school
        $subscribersVodafone2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Vodafone phone number and between 25+ yrs 
        $subscribersVodafone25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 25+ yrs
        $subscribersVodafone25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 25+ yrs in Jhs
        $subscribersVodafone25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 25+ yrs in Shs
        $subscribersVodafone25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 25+ yrs in Tertiary
        $subscribersVodafone25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Vodafone phone number and between 25+ yrs not in school
        $subscribersVodafone25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 25+ yrs
        $subscribersVodafone25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 25+ yrs in Jhs
        $subscribersVodafone25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 25+ yrs in Shs
        $subscribersVodafone25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 25+ yrs in Tertiary
        $subscribersVodafone25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Vodafone phone number and between 25+ yrs not in school
        $subscribersVodafone25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlVodafone . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Next Network Operator : Glo
        //Subscribers with Glo phone number
        $gloC = array("23");
        $sqlGlo = " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $gloC)) . "') ";
        $subscribersGlo = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo)
                ->count();


        //Subscribers registered with Glo phone number and between 0-14 yrs
        $subscribersGlo014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014)
                ->count();

        //Male Subscribers registered with Glo phone number and between 0-14 yrs
        $subscribersGlo014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Glo phone number and between 0-14 yrs in Jhs
        $subscribersGlo014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Glo phone number and between 0-14 yrs in Shs
        $subscribersGlo014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Glo phone number and between 0-14 yrs in Tertiary
        $subscribersGlo014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Glo phone number and between 0-14 yrs not in school
        $subscribersGlo014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Glo phone number and between 0-14 yrs
        $subscribersGlo014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Glo phone number and between 0-14 yrs in Jhs
        $subscribersGlo014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Glo phone number and between 0-14 yrs in Shs
        $subscribersGlo014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Glo phone number and between 0-14 yrs in Tertiary
        $subscribersGlo014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Glo phone number and between 0-14 yrs not in school
        $subscribersGlo014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Glo phone number and between 15-19 yrs
        $subscribersGlo1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519)
                ->count();

        //Male Subscribers registered with Glo phone number and between 15-19 yrs
        $subscribersGlo1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Glo phone number and between 15-19 yrs in Jhs
        $subscribersGlo1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Glo phone number and between 15-19 yrs in Shs
        $subscribersGlo1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Glo phone number and between 15-19 yrs in Tertiary
        $subscribersGlo1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Glo phone number and between 15-19 yrs not in school
        $subscribersGlo1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Glo phone number and between 15-19 yrs
        $subscribersGlo1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Glo phone number and between 15-19 yrs in Jhs
        $subscribersGlo1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Glo phone number and between 15-19 yrs in Shs
        $subscribersGlo1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Glo phone number and between 15-19 yrs in Tertiary
        $subscribersGlo1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Glo phone number and between 15-19 yrs not in school
        $subscribersGlo1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Glo phone number and between 20-24 yrs 
        $subscribersGlo2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024)
                ->count();

        //Male Subscribers registered with Glo phone number and between 20-24 yrs
        $subscribersGlo2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Glo phone number and between 20-24 yrs in Jhs
        $subscribersGlo2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Glo phone number and between 20-24 yrs in Shs
        $subscribersGlo2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Glo phone number and between 20-24 yrs in Tertiary
        $subscribersGlo2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Glo phone number and between 20-24 yrs not in school
        $subscribersGlo2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Glo phone number and between 20-24 yrs
        $subscribersGlo2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Glo phone number and between 20-24 yrs in Jhs
        $subscribersGlo2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Glo phone number and between 20-24 yrs in Shs
        $subscribersGlo2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Glo phone number and between 20-24 yrs in Tertiary
        $subscribersGlo2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Glo phone number and between 20-24 yrs not in school
        $subscribersGlo2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Glo phone number and between 25+ yrs 
        $subscribersGlo25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25)
                ->count();

        //Male Subscribers registered with Glo phone number and between 25+ yrs
        $subscribersGlo25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Glo phone number and between 25+ yrs in Jhs
        $subscribersGlo25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Glo phone number and between 25+ yrs in Shs
        $subscribersGlo25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Glo phone number and between 25+ yrs in Tertiary
        $subscribersGlo25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Glo phone number and between 25+ yrs not in school
        $subscribersGlo25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Glo phone number and between 25+ yrs
        $subscribersGlo25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Glo phone number and between 25+ yrs in Jhs
        $subscribersGlo25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Glo phone number and between 25+ yrs in Shs
        $subscribersGlo25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Glo phone number and between 25+ yrs in Tertiary
        $subscribersGlo25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Glo phone number and between 25+ yrs not in school
        $subscribersGlo25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGlo . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Next Network Operator : Airtel
        //Subscribers with Airtel phone number
        $airtelC = array("26");
        $sqlAirtel = " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $airtelC)) . "') ";
        $subscribersAirtel = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel)
                ->count();


        //Subscribers registered with Airtel phone number and between 0-14 yrs
        $subscribersAirtel014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 0-14 yrs
        $subscribersAirtel014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 0-14 yrs in Jhs
        $subscribersAirtel014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 0-14 yrs in Shs
        $subscribersAirtel014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 0-14 yrs in Tertiary
        $subscribersAirtel014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 0-14 yrs not in school
        $subscribersAirtel014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 0-14 yrs
        $subscribersAirtel014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 0-14 yrs in Jhs
        $subscribersAirtel014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 0-14 yrs in Shs
        $subscribersAirtel014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 0-14 yrs in Tertiary
        $subscribersAirtel014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 0-14 yrs not in school
        $subscribersAirtel014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Airtel phone number and between 15-19 yrs
        $subscribersAirtel1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 15-19 yrs
        $subscribersAirtel1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 15-19 yrs in Jhs
        $subscribersAirtel1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 15-19 yrs in Shs
        $subscribersAirtel1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 15-19 yrs in Tertiary
        $subscribersAirtel1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 15-19 yrs not in school
        $subscribersAirtel1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 15-19 yrs
        $subscribersAirtel1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 15-19 yrs in Jhs
        $subscribersAirtel1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 15-19 yrs in Shs
        $subscribersAirtel1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 15-19 yrs in Tertiary
        $subscribersAirtel1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 15-19 yrs not in school
        $subscribersAirtel1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Airtel phone number and between 20-24 yrs 
        $subscribersAirtel2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 20-24 yrs
        $subscribersAirtel2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 20-24 yrs in Jhs
        $subscribersAirtel2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 20-24 yrs in Shs
        $subscribersAirtel2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 20-24 yrs in Tertiary
        $subscribersAirtel2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 20-24 yrs not in school
        $subscribersAirtel2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 20-24 yrs
        $subscribersAirtel2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 20-24 yrs in Jhs
        $subscribersAirtel2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 20-24 yrs in Shs
        $subscribersAirtel2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 20-24 yrs in Tertiary
        $subscribersAirtel2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 20-24 yrs not in school
        $subscribersAirtel2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Airtel phone number and between 25+ yrs 
        $subscribersAirtel25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 25+ yrs
        $subscribersAirtel25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 25+ yrs in Jhs
        $subscribersAirtel25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 25+ yrs in Shs
        $subscribersAirtel25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 25+ yrs in Tertiary
        $subscribersAirtel25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Airtel phone number and between 25+ yrs not in school
        $subscribersAirtel25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 25+ yrs
        $subscribersAirtel25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 25+ yrs in Jhs
        $subscribersAirtel25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 25+ yrs in Shs
        $subscribersAirtel25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 25+ yrs in Tertiary
        $subscribersAirtel25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Airtel phone number and between 25+ yrs not in school
        $subscribersAirtel25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlAirtel . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Next Network Operator : Expresso
        //Subscribers with Expresso phone number
        $expressoC = array("28");
        $sqlExpresso = " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $expressoC)) . "') ";
        $subscribersExpresso = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso)
                ->count();


        //Subscribers registered with Expresso phone number and between 0-14 yrs
        $subscribersExpresso014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 0-14 yrs
        $subscribersExpresso014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 0-14 yrs in Jhs
        $subscribersExpresso014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 0-14 yrs in Shs
        $subscribersExpresso014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 0-14 yrs in Tertiary
        $subscribersExpresso014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 0-14 yrs not in school
        $subscribersExpresso014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 0-14 yrs
        $subscribersExpresso014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 0-14 yrs in Jhs
        $subscribersExpresso014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 0-14 yrs in Shs
        $subscribersExpresso014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 0-14 yrs in Tertiary
        $subscribersExpresso014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 0-14 yrs not in school
        $subscribersExpresso014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Expresso phone number and between 15-19 yrs
        $subscribersExpresso1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 15-19 yrs
        $subscribersExpresso1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 15-19 yrs in Jhs
        $subscribersExpresso1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 15-19 yrs in Shs
        $subscribersExpresso1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 15-19 yrs in Tertiary
        $subscribersExpresso1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 15-19 yrs not in school
        $subscribersExpresso1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 15-19 yrs
        $subscribersExpresso1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 15-19 yrs in Jhs
        $subscribersExpresso1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 15-19 yrs in Shs
        $subscribersExpresso1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 15-19 yrs in Tertiary
        $subscribersExpresso1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 15-19 yrs not in school
        $subscribersExpresso1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Expresso phone number and between 20-24 yrs 
        $subscribersExpresso2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 20-24 yrs
        $subscribersExpresso2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 20-24 yrs in Jhs
        $subscribersExpresso2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 20-24 yrs in Shs
        $subscribersExpresso2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 20-24 yrs in Tertiary
        $subscribersExpresso2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 20-24 yrs not in school
        $subscribersExpresso2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 20-24 yrs
        $subscribersExpresso2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 20-24 yrs in Jhs
        $subscribersExpresso2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 20-24 yrs in Shs
        $subscribersExpresso2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 20-24 yrs in Tertiary
        $subscribersExpresso2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 20-24 yrs not in school
        $subscribersExpresso2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Expresso phone number and between 25+ yrs 
        $subscribersExpresso25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 25+ yrs
        $subscribersExpresso25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 25+ yrs in Jhs
        $subscribersExpresso25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 25+ yrs in Shs
        $subscribersExpresso25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 25+ yrs in Tertiary
        $subscribersExpresso25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Expresso phone number and between 25+ yrs not in school
        $subscribersExpresso25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 25+ yrs
        $subscribersExpresso25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 25+ yrs in Jhs
        $subscribersExpresso25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 25+ yrs in Shs
        $subscribersExpresso25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 25+ yrs in Tertiary
        $subscribersExpresso25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Expresso phone number and between 25+ yrs not in school
        $subscribersExpresso25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlExpresso . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();



        $chartArray["chart"] = array("type" => "column");
        $chartArray["title"] = array("text" => "NoYawa Registrants By Network Operators");
        $chartArray["subtitle"] = array("text" => "Click the slices to view more breakdowns");
        $chartArray["xAxis"] = array("type" => "category");
        $chartArray["legend"] = array("enabled" => true,"layout"=>"vertical","align"=>"right","verticalAlign"=>"top");
        $chartArray["credits"] = array("enabled" => false);
        //$chartArray["tooltip"] = array("pointFormat" => "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>","headerFormat"=>"<span style='font-size:11px'>{series.name}</span><br>");
        $chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)));
        $chartArray["series"][] = array("type" => "pie", 'name' => "Channels", "colorByPoint" => true, "data" => [
                array("name" => "Mtn", "y" => $subscribersMtn, "drilldown" => "networkMtn"), 
                array("name" => "Tigo", "y" => $subscribersTigo, "drilldown" => "networkTigo"), 
                array("name" => "Airtel", "y" => $subscribersAirtel, "drilldown" => "networkAirtel"),
                array("name" => "Vodafone", "y" => $subscribersVodafone, "drilldown" => "networkVodafone"), 
                array("name" => "Glo", "y" => $subscribersGlo, "drilldown" => "networkGlo"), 
                array("name" => "Expresso", "y" => $subscribersExpresso, "drilldown" => "networkExpresso")]);
        $chartArray["drilldown"] = array("series" => [
                
            //Mtn drilldowns
            array("id" => "networkMtn", "name" => "Mtn : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersMtn014, "drilldown" => "mtnage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersMtn1519, "drilldown" => "mtnage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersMtn2024, "drilldown" => "mtnage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersMtn25, "drilldown" => "mtnage25")]),
            
            array("id" => "mtnage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersMtn014male, "drilldown" => "mtnmaleage014"), array("name" => "Female", "y" => $subscribersMtn014female, "drilldown" => "mtnfemaleage014")]),
                array("name" => "Education Level", "id" => "mtnmaleage014", "data" => [['JHS', $subscribersMtn014malejhs], ['SHS', $subscribersMtn014maleshs], ['Tertiary', $subscribersMtn014maleter], ["Not In School", $subscribersMtn014malena]]),
                array("name" => "Education Level", "id" => "mtnfemaleage014", "data" => [['JHS', $subscribersMtn014femalejhs], ['SHS', $subscribersMtn014femaleshs], ['Tertiary', $subscribersMtn014femaleter], ["Not In School", $subscribersMtn014femalena]]),
                
            array("id" => "mtnage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersMtn1519male, "drilldown" => "mtnmaleage1519"), array("name" => "Female", "y" => $subscribersMtn1519female, "drilldown" => "mtnfemaleage1519")]),
                array("name" => "Education Level", "id" => "mtnmaleage1519", "data" => [['JHS', $subscribersMtn1519malejhs], ['SHS', $subscribersMtn1519maleshs], ['Tertiary', $subscribersMtn1519maleter], ["Not In School", $subscribersMtn1519malena]]),
                array("name" => "Education Level", "id" => "mtnfemaleage1519", "data" => [['JHS', $subscribersMtn1519femalejhs], ['SHS', $subscribersMtn1519femaleshs], ['Tertiary', $subscribersMtn1519femaleter], ["Not In School", $subscribersMtn1519femalena]]),
                
            array("id" => "mtnage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersMtn2024male, "drilldown" => "mtnmaleage2024"), array("name" => "Female", "y" => $subscribersMtn2024female, "drilldown" => "mtnfemaleage2024")]),
                array("name" => "Education Level", "id" => "mtnmaleage2024", "data" => [['JHS', $subscribersMtn2024malejhs], ['SHS', $subscribersMtn2024maleshs], ['Tertiary', $subscribersMtn2024maleter], ["Not In School", $subscribersMtn2024malena]]),
                array("name" => "Education Level", "id" => "mtnfemaleage2024", "data" => [['JHS', $subscribersMtn2024femalejhs], ['SHS', $subscribersMtn2024femaleshs], ['Tertiary', $subscribersMtn2024femaleter], ["Not In School", $subscribersMtn2024femalena]]),
                
            array("id" => "mtnage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersMtn25male, "drilldown" => "mtnmaleage25"), array("name" => "Female", "y" => $subscribersMtn25female, "drilldown" => "mtnfemaleage25")]),
                array("name" => "Education Level", "id" => "mtnmaleage25", "data" => [['JHS', $subscribersMtn25malejhs], ['SHS', $subscribersMtn25maleshs], ['Tertiary', $subscribersMtn25maleter], ["Not In School", $subscribersMtn25malena]]),
                array("name" => "Education Level", "id" => "mtnfemaleage25", "data" => [['JHS', $subscribersMtn25femalejhs], ['SHS', $subscribersMtn25femaleshs], ['Tertiary', $subscribersMtn25femaleter], ["Not In School", $subscribersMtn25femalena]]),
            
            
            //Tigo drilldowns
            array("id" => "networkTigo", "name" => "Tigo : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersTigo014, "drilldown" => "tigoage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersTigo1519, "drilldown" => "tigoage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersTigo2024, "drilldown" => "tigoage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersTigo25, "drilldown" => "tigoage25")]),
            
            array("id" => "tigoage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersTigo014male, "drilldown" => "tigomaleage014"), array("name" => "Female", "y" => $subscribersTigo014female, "drilldown" => "tigofemaleage014")]),
                array("name" => "Education Level", "id" => "tigomaleage014", "data" => [['JHS', $subscribersTigo014malejhs], ['SHS', $subscribersTigo014maleshs], ['Tertiary', $subscribersTigo014maleter], ["Not In School", $subscribersTigo014malena]]),
                array("name" => "Education Level", "id" => "tigofemaleage014", "data" => [['JHS', $subscribersTigo014femalejhs], ['SHS', $subscribersTigo014femaleshs], ['Tertiary', $subscribersTigo014femaleter], ["Not In School", $subscribersTigo014femalena]]),
                
            array("id" => "tigoage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersTigo1519male, "drilldown" => "tigomaleage1519"), array("name" => "Female", "y" => $subscribersTigo1519female, "drilldown" => "tigofemaleage1519")]),
                array("name" => "Education Level", "id" => "tigomaleage1519", "data" => [['JHS', $subscribersTigo1519malejhs], ['SHS', $subscribersTigo1519maleshs], ['Tertiary', $subscribersTigo1519maleter], ["Not In School", $subscribersTigo1519malena]]),
                array("name" => "Education Level", "id" => "tigofemaleage1519", "data" => [['JHS', $subscribersTigo1519femalejhs], ['SHS', $subscribersTigo1519femaleshs], ['Tertiary', $subscribersTigo1519femaleter], ["Not In School", $subscribersTigo1519femalena]]),
                
            array("id" => "tigoage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersTigo2024male, "drilldown" => "tigomaleage2024"), array("name" => "Female", "y" => $subscribersTigo2024female, "drilldown" => "tigofemaleage2024")]),
                array("name" => "Education Level", "id" => "tigomaleage2024", "data" => [['JHS', $subscribersTigo2024malejhs], ['SHS', $subscribersTigo2024maleshs], ['Tertiary', $subscribersTigo2024maleter], ["Not In School", $subscribersTigo2024malena]]),
                array("name" => "Education Level", "id" => "tigofemaleage2024", "data" => [['JHS', $subscribersTigo2024femalejhs], ['SHS', $subscribersTigo2024femaleshs], ['Tertiary', $subscribersTigo2024femaleter], ["Not In School", $subscribersTigo2024femalena]]),
                
            array("id" => "tigoage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersTigo25male, "drilldown" => "tigomaleage25"), array("name" => "Female", "y" => $subscribersTigo25female, "drilldown" => "tigofemaleage25")]),
                array("name" => "Education Level", "id" => "tigomaleage25", "data" => [['JHS', $subscribersTigo25malejhs], ['SHS', $subscribersTigo25maleshs], ['Tertiary', $subscribersTigo25maleter], ["Not In School", $subscribersTigo25malena]]),
                array("name" => "Education Level", "id" => "tigofemaleage25", "data" => [['JHS', $subscribersTigo25femalejhs], ['SHS', $subscribersTigo25femaleshs], ['Tertiary', $subscribersTigo25femaleter], ["Not In School", $subscribersTigo25femalena]]),
            

            //Airtel drilldowns
            
            array("id" => "networkAirtel", "name" => "Airtel : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersAirtel014, "drilldown" => "airtelage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersAirtel1519, "drilldown" => "airtelage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersAirtel2024, "drilldown" => "airtelage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersAirtel25, "drilldown" => "airtelage25")]),
            
            array("id" => "airtelage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersAirtel014male, "drilldown" => "airtelmaleage014"), array("name" => "Female", "y" => $subscribersAirtel014female, "drilldown" => "airtelfemaleage014")]),
                array("name" => "Education Level", "id" => "airtelmaleage014", "data" => [['JHS', $subscribersAirtel014malejhs], ['SHS', $subscribersAirtel014maleshs], ['Tertiary', $subscribersAirtel014maleter], ["Not In School", $subscribersAirtel014malena]]),
                array("name" => "Education Level", "id" => "airtelfemaleage014", "data" => [['JHS', $subscribersAirtel014femalejhs], ['SHS', $subscribersAirtel014femaleshs], ['Tertiary', $subscribersAirtel014femaleter], ["Not In School", $subscribersAirtel014femalena]]),
                
            array("id" => "airtelage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersAirtel1519male, "drilldown" => "airtelmaleage1519"), array("name" => "Female", "y" => $subscribersAirtel1519female, "drilldown" => "airtelfemaleage1519")]),
                array("name" => "Education Level", "id" => "airtelmaleage1519", "data" => [['JHS', $subscribersAirtel1519malejhs], ['SHS', $subscribersAirtel1519maleshs], ['Tertiary', $subscribersAirtel1519maleter], ["Not In School", $subscribersAirtel1519malena]]),
                array("name" => "Education Level", "id" => "airtelfemaleage1519", "data" => [['JHS', $subscribersAirtel1519femalejhs], ['SHS', $subscribersAirtel1519femaleshs], ['Tertiary', $subscribersAirtel1519femaleter], ["Not In School", $subscribersAirtel1519femalena]]),
                
            array("id" => "airtelage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersAirtel2024male, "drilldown" => "airtelmaleage2024"), array("name" => "Female", "y" => $subscribersAirtel2024female, "drilldown" => "airtelfemaleage2024")]),
                array("name" => "Education Level", "id" => "airtelmaleage2024", "data" => [['JHS', $subscribersAirtel2024malejhs], ['SHS', $subscribersAirtel2024maleshs], ['Tertiary', $subscribersAirtel2024maleter], ["Not In School", $subscribersAirtel2024malena]]),
                array("name" => "Education Level", "id" => "airtelfemaleage2024", "data" => [['JHS', $subscribersAirtel2024femalejhs], ['SHS', $subscribersAirtel2024femaleshs], ['Tertiary', $subscribersAirtel2024femaleter], ["Not In School", $subscribersAirtel2024femalena]]),
                
            array("id" => "airtelage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersAirtel25male, "drilldown" => "airtelmaleage25"), array("name" => "Female", "y" => $subscribersAirtel25female, "drilldown" => "airtelfemaleage25")]),
                array("name" => "Education Level", "id" => "airtelmaleage25", "data" => [['JHS', $subscribersAirtel25malejhs], ['SHS', $subscribersAirtel25maleshs], ['Tertiary', $subscribersAirtel25maleter], ["Not In School", $subscribersAirtel25malena]]),
                array("name" => "Education Level", "id" => "airtelfemaleage25", "data" => [['JHS', $subscribersAirtel25femalejhs], ['SHS', $subscribersAirtel25femaleshs], ['Tertiary', $subscribersAirtel25femaleter], ["Not In School", $subscribersAirtel25femalena]]),
            
         
            //Vodafone drilldowns
            
            array("id" => "networkVodafone", "name" => "Vodafone : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersVodafone014, "drilldown" => "vodafoneage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersVodafone1519, "drilldown" => "vodafoneage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersVodafone2024, "drilldown" => "vodafoneage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersVodafone25, "drilldown" => "vodafoneage25")]),
            
            array("id" => "vodafoneage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersVodafone014male, "drilldown" => "vodafonemaleage014"), array("name" => "Female", "y" => $subscribersVodafone014female, "drilldown" => "vodafonefemaleage014")]),
                array("name" => "Education Level", "id" => "vodafonemaleage014", "data" => [['JHS', $subscribersVodafone014malejhs], ['SHS', $subscribersVodafone014maleshs], ['Tertiary', $subscribersVodafone014maleter], ["Not In School", $subscribersVodafone014malena]]),
                array("name" => "Education Level", "id" => "vodafonefemaleage014", "data" => [['JHS', $subscribersVodafone014femalejhs], ['SHS', $subscribersVodafone014femaleshs], ['Tertiary', $subscribersVodafone014femaleter], ["Not In School", $subscribersVodafone014femalena]]),
                
            array("id" => "vodafoneage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersVodafone1519male, "drilldown" => "vodafonemaleage1519"), array("name" => "Female", "y" => $subscribersVodafone1519female, "drilldown" => "vodafonefemaleage1519")]),
                array("name" => "Education Level", "id" => "vodafonemaleage1519", "data" => [['JHS', $subscribersVodafone1519malejhs], ['SHS', $subscribersVodafone1519maleshs], ['Tertiary', $subscribersVodafone1519maleter], ["Not In School", $subscribersVodafone1519malena]]),
                array("name" => "Education Level", "id" => "vodafonefemaleage1519", "data" => [['JHS', $subscribersVodafone1519femalejhs], ['SHS', $subscribersVodafone1519femaleshs], ['Tertiary', $subscribersVodafone1519femaleter], ["Not In School", $subscribersVodafone1519femalena]]),
                
            array("id" => "vodafoneage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersVodafone2024male, "drilldown" => "vodafonemaleage2024"), array("name" => "Female", "y" => $subscribersVodafone2024female, "drilldown" => "vodafonefemaleage2024")]),
                array("name" => "Education Level", "id" => "vodafonemaleage2024", "data" => [['JHS', $subscribersVodafone2024malejhs], ['SHS', $subscribersVodafone2024maleshs], ['Tertiary', $subscribersVodafone2024maleter], ["Not In School", $subscribersVodafone2024malena]]),
                array("name" => "Education Level", "id" => "vodafonefemaleage2024", "data" => [['JHS', $subscribersVodafone2024femalejhs], ['SHS', $subscribersVodafone2024femaleshs], ['Tertiary', $subscribersVodafone2024femaleter], ["Not In School", $subscribersVodafone2024femalena]]),
                
            array("id" => "vodafoneage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersVodafone25male, "drilldown" => "vodafonemaleage25"), array("name" => "Female", "y" => $subscribersVodafone25female, "drilldown" => "vodafonefemaleage25")]),
                array("name" => "Education Level", "id" => "vodafonemaleage25", "data" => [['JHS', $subscribersVodafone25malejhs], ['SHS', $subscribersVodafone25maleshs], ['Tertiary', $subscribersVodafone25maleter], ["Not In School", $subscribersVodafone25malena]]),
                array("name" => "Education Level", "id" => "vodafonefemaleage25", "data" => [['JHS', $subscribersVodafone25femalejhs], ['SHS', $subscribersVodafone25femaleshs], ['Tertiary', $subscribersVodafone25femaleter], ["Not In School", $subscribersVodafone25femalena]]),
            

            //Glo drilldowns
            
            array("id" => "networkGlo", "name" => "Glo : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersGlo014, "drilldown" => "gloage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersGlo1519, "drilldown" => "gloage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersGlo2024, "drilldown" => "gloage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersGlo25, "drilldown" => "gloage25")]),
            
            array("id" => "gloage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersGlo014male, "drilldown" => "glomaleage014"), array("name" => "Female", "y" => $subscribersGlo014female, "drilldown" => "glofemaleage014")]),
                array("name" => "Education Level", "id" => "glomaleage014", "data" => [['JHS', $subscribersGlo014malejhs], ['SHS', $subscribersGlo014maleshs], ['Tertiary', $subscribersGlo014maleter], ["Not In School", $subscribersGlo014malena]]),
                array("name" => "Education Level", "id" => "glofemaleage014", "data" => [['JHS', $subscribersGlo014femalejhs], ['SHS', $subscribersGlo014femaleshs], ['Tertiary', $subscribersGlo014femaleter], ["Not In School", $subscribersGlo014femalena]]),
                
            array("id" => "gloage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersGlo1519male, "drilldown" => "glomaleage1519"), array("name" => "Female", "y" => $subscribersGlo1519female, "drilldown" => "glofemaleage1519")]),
                array("name" => "Education Level", "id" => "glomaleage1519", "data" => [['JHS', $subscribersGlo1519malejhs], ['SHS', $subscribersGlo1519maleshs], ['Tertiary', $subscribersGlo1519maleter], ["Not In School", $subscribersGlo1519malena]]),
                array("name" => "Education Level", "id" => "glofemaleage1519", "data" => [['JHS', $subscribersGlo1519femalejhs], ['SHS', $subscribersGlo1519femaleshs], ['Tertiary', $subscribersGlo1519femaleter], ["Not In School", $subscribersGlo1519femalena]]),
                
            array("id" => "gloage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersGlo2024male, "drilldown" => "glomaleage2024"), array("name" => "Female", "y" => $subscribersGlo2024female, "drilldown" => "glofemaleage2024")]),
                array("name" => "Education Level", "id" => "glomaleage2024", "data" => [['JHS', $subscribersGlo2024malejhs], ['SHS', $subscribersGlo2024maleshs], ['Tertiary', $subscribersGlo2024maleter], ["Not In School", $subscribersGlo2024malena]]),
                array("name" => "Education Level", "id" => "glofemaleage2024", "data" => [['JHS', $subscribersGlo2024femalejhs], ['SHS', $subscribersGlo2024femaleshs], ['Tertiary', $subscribersGlo2024femaleter], ["Not In School", $subscribersGlo2024femalena]]),
                
            array("id" => "gloage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersGlo25male, "drilldown" => "glomaleage25"), array("name" => "Female", "y" => $subscribersGlo25female, "drilldown" => "glofemaleage25")]),
                array("name" => "Education Level", "id" => "glomaleage25", "data" => [['JHS', $subscribersGlo25malejhs], ['SHS', $subscribersGlo25maleshs], ['Tertiary', $subscribersGlo25maleter], ["Not In School", $subscribersGlo25malena]]),
                array("name" => "Education Level", "id" => "glofemaleage25", "data" => [['JHS', $subscribersGlo25femalejhs], ['SHS', $subscribersGlo25femaleshs], ['Tertiary', $subscribersGlo25femaleter], ["Not In School", $subscribersGlo25femalena]]),
            

            //Expresso drilldowns
            
            array("id" => "networkExpresso", "name" => "Expresso : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersExpresso014, "drilldown" => "expressoage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersExpresso1519, "drilldown" => "expressoage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersExpresso2024, "drilldown" => "expressoage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersExpresso25, "drilldown" => "expressoage25")]),
            
            array("id" => "expressoage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersExpresso014male, "drilldown" => "expressomaleage014"), array("name" => "Female", "y" => $subscribersExpresso014female, "drilldown" => "expressofemaleage014")]),
                array("name" => "Education Level", "id" => "expressomaleage014", "data" => [['JHS', $subscribersExpresso014malejhs], ['SHS', $subscribersExpresso014maleshs], ['Tertiary', $subscribersExpresso014maleter], ["Not In School", $subscribersExpresso014malena]]),
                array("name" => "Education Level", "id" => "expressofemaleage014", "data" => [['JHS', $subscribersExpresso014femalejhs], ['SHS', $subscribersExpresso014femaleshs], ['Tertiary', $subscribersExpresso014femaleter], ["Not In School", $subscribersExpresso014femalena]]),
                
            array("id" => "expressoage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersExpresso1519male, "drilldown" => "expressomaleage1519"), array("name" => "Female", "y" => $subscribersExpresso1519female, "drilldown" => "expressofemaleage1519")]),
                array("name" => "Education Level", "id" => "expressomaleage1519", "data" => [['JHS', $subscribersExpresso1519malejhs], ['SHS', $subscribersExpresso1519maleshs], ['Tertiary', $subscribersExpresso1519maleter], ["Not In School", $subscribersExpresso1519malena]]),
                array("name" => "Education Level", "id" => "expressofemaleage1519", "data" => [['JHS', $subscribersExpresso1519femalejhs], ['SHS', $subscribersExpresso1519femaleshs], ['Tertiary', $subscribersExpresso1519femaleter], ["Not In School", $subscribersExpresso1519femalena]]),
                
            array("id" => "expressoage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersExpresso2024male, "drilldown" => "expressomaleage2024"), array("name" => "Female", "y" => $subscribersExpresso2024female, "drilldown" => "expressofemaleage2024")]),
                array("name" => "Education Level", "id" => "expressomaleage2024", "data" => [['JHS', $subscribersExpresso2024malejhs], ['SHS', $subscribersExpresso2024maleshs], ['Tertiary', $subscribersExpresso2024maleter], ["Not In School", $subscribersExpresso2024malena]]),
                array("name" => "Education Level", "id" => "expressofemaleage2024", "data" => [['JHS', $subscribersExpresso2024femalejhs], ['SHS', $subscribersExpresso2024femaleshs], ['Tertiary', $subscribersExpresso2024femaleter], ["Not In School", $subscribersExpresso2024femalena]]),
                
            array("id" => "expressoage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersExpresso25male, "drilldown" => "expressomaleage25"), array("name" => "Female", "y" => $subscribersExpresso25female, "drilldown" => "expressofemaleage25")]),
                array("name" => "Education Level", "id" => "expressomaleage25", "data" => [['JHS', $subscribersExpresso25malejhs], ['SHS', $subscribersExpresso25maleshs], ['Tertiary', $subscribersExpresso25maleter], ["Not In School", $subscribersExpresso25malena]]),
                array("name" => "Education Level", "id" => "expressofemaleage25", "data" => [['JHS', $subscribersExpresso25femalejhs], ['SHS', $subscribersExpresso25femaleshs], ['Tertiary', $subscribersExpresso25femaleter], ["Not In School", $subscribersExpresso25femalena]])
            

            
            ]);

        return $chartArray;
    }
    

}
