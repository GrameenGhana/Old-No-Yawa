<?php

class StatsController extends BaseController {

    public function showGeneralChart(){
        
           //getting all subscirbers so as to get the count
        //$subs = 'Select count(*) From clients_sms_registration';
        $subscribersCount = DB::table('clients_sms_registration')     
                ->count();
        
        // gender data
        $sqlmale = ' client_gender = "m" ';
        $sqlfemale = ' client_gender = "f" ';
        
        //Male Subscribers 
        $subscribersMale = DB::table('clients_sms_registration')
                ->whereRaw($sqlmale)
                ->count();
        
         //Female Subscribers 
        $subscribersFemale = DB::table('clients_sms_registration')
                ->whereRaw($sqlfemale)
                ->count();
        
         // Number of not-assigned subscribers
        $subscribersNotAssignedGender = DB::table('clients_sms_registration')
                ->whereRaw('client_gender  NOT IN ("M","F") ')
                ->count();
        
        $subscribersByGender["chart"] = array("plotBackgroundColor" => null,"plotBorderWidth"=>1,"plotShadow"=>false);
        $subscribersByGender["title"] = array("text" => " ");
        //$chartArray["tooltip"] = array("pointFormat" => "{series.name}: <b>{point.percentage:.1f}%</b>");
        $subscribersByGender["legend"] = array("enabled" => true);
        $subscribersByGender["credits"] = array("enabled" => false);
        $subscribersByGender["plotOptions"] = array("pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})")));
        $subscribersByGender["series"][] = array("type" => "pie", 'name' => "Registrants By Gender", "data" => [array("name" => "Males", "y" => $subscribersMale), array("name" => "Females", "y" => $subscribersFemale), array("name" => "Not Assigned", "y" => $subscribersNotAssignedGender) ]);
       
        
        // educational level data
        $sqljhs = ' client_education_level="jhs" ';
        $sqlshs = ' client_education_level="shs" ';
        $sqlter = ' client_education_level="ter" ';
        $sqlna = ' client_education_level="na" ';
        
        //Jhs Level Subscribers 
        $subscribersJhs = DB::table('clients_sms_registration')
                ->whereRaw($sqljhs)
                ->count();
        
        //Shs Level Subscribers 
        $subscribersShs = DB::table('clients_sms_registration')
                ->whereRaw($sqlshs)
                ->count();
        
        //Tertiary Level Subscribers 
        $subscribersTer = DB::table('clients_sms_registration')
                ->whereRaw($sqlter)
                ->count();
        
        //Not In School Subscribers 
        $subscribersNa = DB::table('clients_sms_registration')
                ->whereRaw($sqlna)
                ->count();
        
         //Other educational level subscribers
        $subscribersOtherLevel = DB::table('clients_sms_registration')
                ->whereRaw('client_education_level  NOT IN ("Jhs","Shs","Ter","Na") ')
                ->count();
        
        $subscribersByEduLevel["chart"] = array("plotBackgroundColor" => null,"plotBorderWidth"=>1,"plotShadow"=>false);
        $subscribersByEduLevel["title"] = array("text" => " ");
        //$chartArray["tooltip"] = array("pointFormat" => "{series.name}: <b>{point.percentage:.1f}%</b>");
        $subscribersByEduLevel["legend"] = array("enabled" => true);
        $subscribersByEduLevel["credits"] = array("enabled" => false);
        $subscribersByEduLevel["plotOptions"] = array("pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})")));
        $subscribersByEduLevel["series"][] = array("type" => "pie", 'name' => "Registrants By Education Level", "data" => [array("name" => "JHS", "y" => $subscribersJhs), array("name" => "SHS", "y" => $subscribersShs), array("name" => "Tertiary", "y" => $subscribersTer) , array("name" => "Not In School", "y" => $subscribersNa) , array("name" => "Others", "y" => $subscribersOtherLevel) ]);
       
        
        //voice languages  data
        $sqlenglish = ' And client_language="English"';
        $sqltwi = ' And client_language="Twi"';
        $sqlewe = ' And  client_language="Ewe"';
        $sqlhausa = ' And  client_language="Hausa"';
        $sqldangme = ' And  client_language="Dangme"';
        $sqldagbani = ' And  client_language="Dagbani"';
        $sqldagaare = ' And  client_language="Dagaare"';
        $sqlkassem = ' And  client_language="Kassem"';
        $sqlgonja = ' And  client_language="Gonja"';
        
        $sqlnotassigned = ' And  client_language NOT IN ("English","Gonja","Twi","Ewe","Hausa","Dangme","Dagbani","Dagaare","Kassem") ';
        $sqlnulllanguage = ' And client_language IS NULL ';
        
        $sqlvoice = ' channel="Voice" And status IN ("Completed","LongCode") ';
        
        //English Voice
        $subscribersEnglish = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqlenglish)
                ->count();
        
        //Twi Voice 
        $subscribersTwi = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqltwi)
                ->count();
        
        //Ewe Voice 
        $subscribersEwe = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqlewe)
                ->count();
        
        //Hausa 
        $subscribersHausa = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqlhausa)
                ->count();
        
         //Dangwe  
        $subscribersDangwe = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqldangme)
                ->count();
        
        //Dagbani 
        $subscribersDagbani = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqldagbani)
                ->count();
        
        //Dagaare 
        $subscribersDagaare = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqldagaare)
                ->count();
        
        //Kaseem 
        $subscribersKassem = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqlkassem)
                ->count();
        
        //Gonja 
        $subscribersGonja = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqlgonja)
                ->count();
        
         //Not Assigned 
        $subscribersNotAssignedVoice = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqlnotassigned)
                ->count();
        
         //Null language 
        $subscribersNullLanguage = DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice. ' ' .$sqlnulllanguage)
                ->count();
        
        //Voice Subscribers
        $subscribersVoice =  DB::table('clients_sms_registration')
                ->whereRaw($sqlvoice)
                ->count();
        
        $subscribersByVoice["chart"] = array("plotBackgroundColor" => null,"plotBorderWidth"=>1,"plotShadow"=>false);
        $subscribersByVoice["title"] = array("text" => " ");
        //$chartArray["tooltip"] = array("pointFormat" => "{series.name}: <b>{point.percentage:.1f}%</b>");
        $subscribersByVoice["legend"] = array("enabled" => true);
        $subscribersByVoice["credits"] = array("enabled" => false);
        $subscribersByVoice["plotOptions"] = array("pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})")));
        $subscribersByVoice["series"][] = array("type" => "pie", 'name' => "Registrants By Voice Languages", "data" => [array("name" => "English", "y" => $subscribersEnglish), array("name" => "Twi", "y" => $subscribersTwi), 
            array("name" => "Ewe", "y" => $subscribersEwe) , array("name" => "Hausa", "y" => $subscribersHausa) , array("name" => "Dangme", "y" => $subscribersDangwe) , 
            array("name" => "Dagbani", "y" => $subscribersDagbani), array("name" => "Dagaare", "y" => $subscribersDagaare) , array("name" => "Kassem", "y" => $subscribersKassem), array("name" => "Gonja", "y" => $subscribersGonja)  , array("name" => "Not Assigned", "y" => ($subscribersNotAssignedVoice + $subscribersNullLanguage) ) ]);
       

        
        // campaign data
        $sqlroland = ' And UPPER(campaignid)="RONALD" ';
        $sqlrita = ' And UPPER(campaignid)="RITA" ';
        $sqlkiki = ' And UPPER(campaignid)="KIKI" ';
        
        $sqlcompleted = ' status IN ("Completed","LongCode") ';
        
        //Ronald Subscribers 
        $subscribersRonald = DB::table('clients_sms_registration')
                ->whereRaw($sqlcompleted ." ". $sqlroland)
                ->count();
        
        //Rita Subscribers 
        $subscribersRita = DB::table('clients_sms_registration')
                ->whereRaw($sqlcompleted ." ". $sqlrita)
                ->count();
        
        //Kiki  Subscribers 
        $subscribersKiki = DB::table('clients_sms_registration')
                ->whereRaw($sqlcompleted ." ". $sqlkiki)
                ->count();
        
        
        
        $subscribersByCampaign["chart"] = array("plotBackgroundColor" => null,"plotBorderWidth"=>1,"plotShadow"=>false);
        $subscribersByCampaign["title"] = array("text" => " ");
        //$chartArray["tooltip"] = array("pointFormat" => "{series.name}: <b>{point.percentage:.1f}%</b>");
        $subscribersByCampaign["legend"] = array("enabled" => true);
        $subscribersByCampaign["credits"] = array("enabled" => false);
        $subscribersByCampaign["plotOptions"] = array("pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})")));
        $subscribersByCampaign["series"][] = array("type" => "pie", 'name' => "Registrants By Campaign", "data" => [array("name" => "15-19 yrs (In School) ", "y" => $subscribersRonald), array("name" => "20-24 yrs", "y" => $subscribersRita), array("name" => "15-19 yrs (Not In School)", "y" => $subscribersKiki) ]);
       
        

        $data = array("subscribersCount"=>$subscribersCount,"subscribersByGender"=>$subscribersByGender,'subscribersMale'=>$subscribersMale,'subscribersFemale'=>$subscribersFemale,'subscribersNotAssignedGender'=>$subscribersNotAssignedGender,
            'subscribersByEduLevel'=>$subscribersByEduLevel,'subscribersJhs'=>$subscribersJhs,'subscribersShs'=>$subscribersShs,'subscribersTer'=>$subscribersTer,'subscribersNa'=>$subscribersNa,'subscribersOtherLevel'=>$subscribersOtherLevel,
            'subscribersByVoice'=>$subscribersByVoice,'subscribersVoice'=>$subscribersVoice,'subscribersEnglish'=>$subscribersEnglish,'subscribersTwi'=>$subscribersTwi,'subscribersEwe'=>$subscribersEwe,'subscribersHausa'=>$subscribersHausa,'subscribersDangwe'=>$subscribersDangwe,
            'subscribersDagbani'=>$subscribersDagbani,'subscribersDagaare'=>$subscribersDagaare,'subscribersKassem'=>$subscribersKassem, 'subscribersGonja'=>$subscribersGonja,'subscribersNotAssignedVoice'=>($subscribersNotAssignedVoice + $subscribersNullLanguage),
            'subscribersByCampaign'=>$subscribersByCampaign,'subscribersRonald'=>$subscribersRonald,'subscribersRita'=>$subscribersRita,'subscribersKiki'=>$subscribersKiki);
        
        
         return View::make('stats/generalcharts')->with($data);
    }
  
     public function showLocationChart(){
        
           //getting all subscirbers so as to get the count
        //$subs = 'Select count(*) From clients_sms_registration';
        $subscribersCount = DB::table('clients_sms_registration')     
                ->count();
        
        // location chart data
        $sqlregion = ' UPPER(client_region) Like ';
        $sqlGreaterAccra = $sqlregion . ' UPPER("Greater Accra%") ';
        $sqlAshanti = $sqlregion .'  UPPER("Ashanti%") ';
        $sqlBrongAhafo = $sqlregion . ' UPPER("Brong Ahafo%") ';
        $sqlCentral = $sqlregion .'  UPPER("Central%") ';
        $sqlNorthern = $sqlregion .'  UPPER("Northern%") ';
        $sqlUpperEast = $sqlregion .'  UPPER("Upper East%") ';
        $sqlUpperWest = $sqlregion .'  UPPER("Upper West%") ';
        $sqlVolta = $sqlregion .'  UPPER("Volta%") ';
        $sqlEastern = $sqlregion .'  UPPER("Eastern%") ';
        $sqlWestern = $sqlregion .'  UPPER("Western%") ';
        
        $sqlNoLocation = ' UPPER(client_region) Not Like  UPPER("Greater Accra%") And UPPER(client_region) Not Like  UPPER("Ashanti%") '
                . 'And UPPER(client_region) Not Like  UPPER("Brong Ahafo%") And UPPER(client_region) Not Like  UPPER("Central%") And UPPER(client_region) Not Like  UPPER("Northern%") '
                . 'And UPPER(client_region) Not Like  UPPER("Upper East%") And UPPER(client_region) Not Like  UPPER("Upper West%") And UPPER(client_region) Not Like  UPPER("Volta%") '
                . 'And UPPER(client_region) Not Like  UPPER("Eastern%") And UPPER(client_region) Not Like  UPPER("Western%")';
        
        
        //Greater Accra Region 
        $subscribersGreaterAccra = DB::table('clients_sms_registration')
                ->whereRaw($sqlGreaterAccra)
                ->count();
        
         //Ashanti Region 
        $subscribersAshanti = DB::table('clients_sms_registration')
                ->whereRaw($sqlAshanti)
                ->count();
        
         // Brong Ahafo Region
        $subscribersBrongAhafo = DB::table('clients_sms_registration')
                ->whereRaw($sqlBrongAhafo)
                ->count();
        
         //Central Region 
        $subscribersCentral = DB::table('clients_sms_registration')
                ->whereRaw($sqlCentral)
                ->count();
        
        //Northern Region 
        $subscribersNorthern = DB::table('clients_sms_registration')
                ->whereRaw($sqlNorthern)
                ->count();
        
         //Upper East Region 
        $subscribersUpperEast = DB::table('clients_sms_registration')
                ->whereRaw($sqlUpperEast)
                ->count();
        
         //Upper West Region 
        $subscribersUpperWest = DB::table('clients_sms_registration')
                ->whereRaw($sqlUpperWest)
                ->count();
        
         //Volta Region 
        $subscribersVolta = DB::table('clients_sms_registration')
                ->whereRaw($sqlVolta)
                ->count();
        
         //Eastern Region 
        $subscribersEastern = DB::table('clients_sms_registration')
                ->whereRaw($sqlEastern)
                ->count();
        
         //Western Region 
        $subscribersWestern = DB::table('clients_sms_registration')
                ->whereRaw($sqlWestern)
                ->count();
        
        //Not Assigned  Region 
        $subscribersNotAssigned = DB::table('clients_sms_registration')
                ->whereRaw($sqlNoLocation)
                ->count();
        
        
        $subscribersByLocation["chart"] = array("plotBackgroundColor" => null,"plotBorderWidth"=>1,"plotShadow"=>false);
        $subscribersByLocation["title"] = array("text" => " ");
        $subscribersByLocation["legend"] = array("enabled" => true);
        $subscribersByLocation["credits"] = array("enabled" => false);
        $subscribersByLocation["plotOptions"] = array("pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})")));
        $subscribersByLocation["series"][] = array("type" => "pie", 'name' => "Registrants By Location(Regions)", "data" => [array("name" => "Greater Accra", "y" => $subscribersGreaterAccra), array("name" => "Ashanti", "y" => $subscribersAshanti), array("name" => "Brong Ahafo", "y" => $subscribersBrongAhafo), 
            array("name" => "Central", "y" => $subscribersCentral), array("name" => "Northern", "y" => $subscribersNorthern), array("name" => "Upper East", "y" => $subscribersUpperEast), array("name" => "Upper West", "y" => $subscribersUpperWest), 
            array("name" => "Volta", "y" => $subscribersVolta), array("name" => "Eastern", "y" => $subscribersEastern), array("name" => "Western", "y" => $subscribersWestern), array("name" => "Not Assigned", "y" => $subscribersNotAssigned) ]);
       

        $data = array("subscribersCount"=>$subscribersCount,"subscribersByLocation"=>$subscribersByLocation,'subscribersGreaterAccra'=>$subscribersGreaterAccra,'subscribersAshanti'=>$subscribersAshanti,'subscribersBrongAhafo'=>$subscribersBrongAhafo,
            'subscribersCentral'=>$subscribersCentral,'subscribersNorthern'=>$subscribersNorthern,'subscribersUpperEast'=>$subscribersUpperEast,'subscribersUpperWest'=>$subscribersUpperWest,
            'subscribersVolta'=>$subscribersVolta,'subscribersEastern'=>$subscribersEastern,'subscribersWestern'=>$subscribersWestern,'subscribersNotAssigned'=>$subscribersNotAssigned);
        
        
         return View::make('stats/locationcharts')->with($data);
    }
    
    public function showDetailChart() {

        //getting chart array of subscribers by age
        $subscribersByAge = $this->getSubscribersByAgeChart();
        $subscribersByChannel = $this->getSubscribersByChannelChart();
        $subscribersByOperator = $this->getSubscribersByOperatorChart();
        $subscribersBySource = $this->getSubscribersBySourceChart();
        

        $data = array("subscribersByAge"=>$subscribersByAge,"subscribersByChannel"=>$subscribersByChannel,"subscribersByOperator"=>$subscribersByOperator,"subscribersBySource"=>$subscribersBySource);
        
        return View::make('stats/detailcharts')->with($data);
    }
    
    public function getSubscribersByAgeChart() {
        $sqlmale = ' and client_gender = "m" ';
        $sqlfemale = ' and client_gender = "f" ';
        $sqljhs = ' and client_education_level="jhs"';
        $sqlshs = ' and client_education_level="shs"';
        $sqlter = ' and client_education_level="ter"';
        $sqlna = ' and client_education_level="na"';


        
        //Subscribers between 0-14 yrs
        $sql014 = 'status IN ("LongCode","Completed") and client_age >= 0 and client_age <=14 ';
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
        $sql1519 = 'status IN ("LongCode","Completed") and  client_age >= 15 and client_age <=19 ';
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
        $sql2024 = 'status IN ("LongCode","Completed") and  client_age >= 20 and client_age <=24';
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
        $sql25 = 'status IN ("LongCode","Completed") and  client_age >= 25  ';
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
          $chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)),"pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})")));
         //$chartArray["plotOptions"] = array("pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} %")));
        $chartArray["series"][] = array("type" => "pie", 'name' => "Age Ranges", "colorByPoint" => true, "data" => [ array("name" => "15-19 yrs", "y" => $subscribers1519, "drilldown" => "age1519"),
                array("name" => "20-24 yrs", "y" => $subscribers2024, "drilldown" => "age2024")]);
        $chartArray["drilldown"] = array("series" => [
                
            array("id" => "age014", "name" => "0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribers014male, "drilldown" => "maleage014"), array("name" => "Female", "y" => $subscribers014female, "drilldown" => "femaleage014")]),
                array("name" => "0-14 yrs : Males By Education Level", "id" => "maleage014", "data" => [['JHS', $subscribers014malejhs], ['SHS', $subscribers014maleshs], ['Tertiary', $subscribers014maleter], ["Not In School", $subscribers014malena]]),
                array("name" => "0-14 yrs : Females By Education Level", "id" => "femaleage014", "data" => [['JHS', $subscribers014femalejhs], ['SHS', $subscribers014femaleshs], ['Tertiary', $subscribers014femaleter], ["Not In School", $subscribers014femalena]]),
                
            array("id" => "age1519", "name" => "15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribers1519male, "drilldown" => "maleage1519"), array("name" => "Female", "y" => $subscribers1519female, "drilldown" => "femaleage1519")]),
                array("name" => "15-19 yrs : Males By Education Level", "id" => "maleage1519", "data" => [['JHS', $subscribers1519malejhs], ['SHS', $subscribers1519maleshs], ['Tertiary', $subscribers1519maleter], ["Not In School", $subscribers1519malena]]),
                array("name" => "15-19 yrs : Females By Education Level", "id" => "femaleage1519", "data" => [['JHS', $subscribers1519femalejhs], ['SHS', $subscribers1519femaleshs], ['Tertiary', $subscribers1519femaleter], ["Not In School", $subscribers1519femalena]]),
                
            array("id" => "age2024", "name" => "20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribers2024male, "drilldown" => "maleage2024"), array("name" => "Female", "y" => $subscribers2024female, "drilldown" => "femaleage2024")]),
                array("name" => "20-24 yrs : Males By Education Level", "id" => "maleage2024", "data" => [['JHS', $subscribers2024malejhs], ['SHS', $subscribers2024maleshs], ['Tertiary', $subscribers2024maleter], ["Not In School", $subscribers2024malena]]),
                array("name" => "20-24 yrs : Females By Education Level", "id" => "femaleage2024", "data" => [['JHS', $subscribers2024femalejhs], ['SHS', $subscribers2024femaleshs], ['Tertiary', $subscribers2024femaleter], ["Not In School", $subscribers2024femalena]]),
                
            array("id" => "age25", "name" => "25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribers25male, "drilldown" => "maleage25"), array("name" => "Female", "y" => $subscribers25female, "drilldown" => "femaleage25")]),
                array("name" => "25+ yrs : Males By Education Level", "id" => "maleage25", "data" => [['JHS', $subscribers25malejhs], ['SHS', $subscribers25maleshs], ['Tertiary', $subscribers25maleter], ["Not In School", $subscribers25malena]]),
                array("name" => "25+ yrs : Females By Education Level", "id" => "femaleage25", "data" => [['JHS', $subscribers25femalejhs], ['SHS', $subscribers25femaleshs], ['Tertiary', $subscribers25femaleter], ["Not In School", $subscribers25femalena]])]);

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
        $sqlsms = 'status IN ("LongCode","Completed") and  channel = "sms" ';
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
        $sqlvoice = 'status IN ("LongCode","Completed") and  channel = "voice" ';
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
        $chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)),"pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})")));
        //$chartArray["plotOptions"] = array("pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} %")));
        $chartArray["series"][] = array("type" => "pie", 'name' => "Channels", "colorByPoint" => true, "data" => [array("name" => "SMS", "y" => $subscribersSms, "drilldown" => "channelSms"), 
                array("name" => "Voice", "y" => $subscribersVoice, "drilldown" => "channelVoice")]);
        $chartArray["drilldown"] = array("series" => [
                
            array("id" => "channelSms", "name" => "SMS By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersSms1519, "drilldown" => "smsage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersSms2024, "drilldown" => "smsage2024")]),
            
            array("id" => "smsage014", "name" => "SMS : 0-14 yrs By Gender", "data" => [array("name" => "SMS :  0-14 yrs : Male", "y" => $subscribersSms014male, "drilldown" => "smsmaleage014"), array("name" => "SMS :  0-14 yrs : Female", "y" => $subscribersSms014female, "drilldown" => "smsfemaleage014")]),
                array("name" => "SMS :  0-14 yrs : Male By Education Level", "id" => "smsmaleage014", "data" => [['JHS', $subscribersSms014malejhs], ['SHS', $subscribersSms014maleshs], ['Tertiary', $subscribersSms014maleter], ["Not In School", $subscribersSms014malena]]),
                array("name" => "SMS :  0-14 yrs : Female By Education Level", "id" => "smsfemaleage014", "data" => [['JHS', $subscribersSms014femalejhs], ['SHS', $subscribersSms014femaleshs], ['Tertiary', $subscribersSms014femaleter], ["Not In School", $subscribersSms014femalena]]),
                
            array("id" => "smsage1519", "name" => "SMS : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersSms1519male, "drilldown" => "smsmaleage1519"), array("name" => "Female", "y" => $subscribersSms1519female, "drilldown" => "smsfemaleage1519")]),
                array("name" => "SMS :  15-19 yrs : Male By Education Level", "id" => "smsmaleage1519", "data" => [['JHS', $subscribersSms1519malejhs], ['SHS', $subscribersSms1519maleshs], ['Tertiary', $subscribersSms1519maleter], ["Not In School", $subscribersSms1519malena]]),
                array("name" => "SMS :  15-19 yrs : Female By Education Level", "id" => "smsfemaleage1519", "data" => [['JHS', $subscribersSms1519femalejhs], ['SHS', $subscribersSms1519femaleshs], ['Tertiary', $subscribersSms1519femaleter], ["Not In School", $subscribersSms1519femalena]]),
                
            array("id" => "smsage2024", "name" => "SMS : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersSms2024male, "drilldown" => "smsmaleage2024"), array("name" => "Female", "y" => $subscribersSms2024female, "drilldown" => "smsfemaleage2024")]),
                array("name" => "SMS : 20-24 yrs : Male By Education Level", "id" => "smsmaleage2024", "data" => [['JHS', $subscribersSms2024malejhs], ['SHS', $subscribersSms2024maleshs], ['Tertiary', $subscribersSms2024maleter], ["Not In School", $subscribersSms2024malena]]),
                array("name" => "SMS : 20-24 yrs : Female By Education Level", "id" => "smsfemaleage2024", "data" => [['JHS', $subscribersSms2024femalejhs], ['SHS', $subscribersSms2024femaleshs], ['Tertiary', $subscribersSms2024femaleter], ["Not In School", $subscribersSms2024femalena]]),
                
            array("id" => "smsage25", "name" => "SMS : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersSms25male, "drilldown" => "smsmaleage25"), array("name" => "Female", "y" => $subscribersSms25female, "drilldown" => "smsfemaleage25")]),
                array("name" => "SMS : 25+ yrs : Male By Education Level", "id" => "smsmaleage25", "data" => [['JHS', $subscribersSms25malejhs], ['SHS', $subscribersSms25maleshs], ['Tertiary', $subscribersSms25maleter], ["Not In School", $subscribersSms25malena]]),
                array("name" => "SMS : 25+ yrs : Female By Education Level", "id" => "smsfemaleage25", "data" => [['JHS', $subscribersSms25femalejhs], ['SHS', $subscribersSms25femaleshs], ['Tertiary', $subscribersSms25femaleter], ["Not In School", $subscribersSms25femalena]]),
            
            array("id" => "channelVoice", "name" => "Voice By Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersVoice014, "drilldown" => "voiceage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersVoice1519, "drilldown" => "voiceage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersVoice2024, "drilldown" => "voiceage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersVoice25, "drilldown" => "voiceage25")]),
            
            array("id" => "voiceage014", "name" => "Voice : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersVoice014male, "drilldown" => "voicemaleage014"), array("name" => "Female", "y" => $subscribersVoice014female, "drilldown" => "voicefemaleage014")]),
                array("name" => "Voice : 0-14 yrs : Male By Education Level", "id" => "voicemaleage014", "data" => [['JHS', $subscribersVoice014malejhs], ['SHS', $subscribersVoice014maleshs], ['Tertiary', $subscribersVoice014maleter], ["Not In School", $subscribersVoice014malena]]),
                array("name" => "Voice : 0-14 yrs : Female By Education Level", "id" => "voicefemaleage014", "data" => [['JHS', $subscribersVoice014femalejhs], ['SHS', $subscribersVoice014femaleshs], ['Tertiary', $subscribersVoice014femaleter], ["Not In School", $subscribersVoice014femalena]]),
                
            array("id" => "voiceage1519", "name" => "Voice : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersVoice1519male, "drilldown" => "voicemaleage1519"), array("name" => "Female", "y" => $subscribersVoice1519female, "drilldown" => "voicefemaleage1519")]),
                array("name" => "Voice : 15-19 yrs : Male By Education Level", "id" => "voicemaleage1519", "data" => [['JHS', $subscribersVoice1519malejhs], ['SHS', $subscribersVoice1519maleshs], ['Tertiary', $subscribersVoice1519maleter], ["Not In School", $subscribersVoice1519malena]]),
                array("name" => "Voice : 15-19 yrs : Female By Education Level", "id" => "voicefemaleage1519", "data" => [['JHS', $subscribersVoice1519femalejhs], ['SHS', $subscribersVoice1519femaleshs], ['Tertiary', $subscribersVoice1519femaleter], ["Not In School", $subscribersVoice1519femalena]]),
                
            array("id" => "voiceage2024", "name" => "Voice : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersVoice2024male, "drilldown" => "voicemaleage2024"), array("name" => "Female", "y" => $subscribersVoice2024female, "drilldown" => "voicefemaleage2024")]),
                array("name" => "Voice : 20-24 yrs : Male By Education Level", "id" => "voicemaleage2024", "data" => [['JHS', $subscribersVoice2024malejhs], ['SHS', $subscribersVoice2024maleshs], ['Tertiary', $subscribersVoice2024maleter], ["Not In School", $subscribersVoice2024malena]]),
                array("name" => "Voice : 20-24 yrs : Female By Education Level", "id" => "voicefemaleage2024", "data" => [['JHS', $subscribersVoice2024femalejhs], ['SHS', $subscribersVoice2024femaleshs], ['Tertiary', $subscribersVoice2024femaleter], ["Not In School", $subscribersVoice2024femalena]]),
                
            array("id" => "voiceage25", "name" => "Voice : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersVoice25male, "drilldown" => "voicemaleage25"), array("name" => "Female", "y" => $subscribersVoice25female, "drilldown" => "voicefemaleage25")]),
                array("name" => "Voice : 25+ yrs : Male By Education Level", "id" => "voicemaleage25", "data" => [['JHS', $subscribersVoice25malejhs], ['SHS', $subscribersVoice25maleshs], ['Tertiary', $subscribersVoice25maleter], ["Not In School", $subscribersVoice25malena]]),
                array("name" => "Voice : 25+ yrs : Female By Education Level", "id" => "voicefemaleage25", "data" => [['JHS', $subscribersVoice25femalejhs], ['SHS', $subscribersVoice25femaleshs], ['Tertiary', $subscribersVoice25femaleter], ["Not In School", $subscribersVoice25femalena]])
            
            
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
        $sqlMtn = 'status IN ("LongCode","Completed") and' . " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $mtnC)) . "') ";
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
        $sqlTigo = 'status IN ("LongCode","Completed") and' . " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $tigoC)) . "') ";
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
        $sqlVodafone = 'status IN ("LongCode","Completed") and' . " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $vodaC)) . "') ";
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
        $sqlGlo = 'status IN ("LongCode","Completed") and' . " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $gloC)) . "') ";
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
        $sqlAirtel = 'status IN ("LongCode","Completed") and' . " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $airtelC)) . "') ";
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
        $sqlExpresso = 'status IN ("LongCode","Completed") and' . " substring(client_number,4,2)  IN ('" . str_replace(" ", "", implode("', '", $expressoC)) . "') ";
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
        $chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)),"pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})"))); 
       //$chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)));
        $chartArray["series"][] = array("type" => "pie", 'name' => "Channels", "colorByPoint" => true, "data" => [
                array("name" => "Mtn", "y" => $subscribersMtn, "drilldown" => "networkMtn"), 
                array("name" => "Tigo", "y" => $subscribersTigo, "drilldown" => "networkTigo"), 
                array("name" => "Airtel", "y" => $subscribersAirtel, "drilldown" => "networkAirtel"),
                array("name" => "Vodafone", "y" => $subscribersVodafone, "drilldown" => "networkVodafone"), 
                array("name" => "Glo", "y" => $subscribersGlo, "drilldown" => "networkGlo"), 
                array("name" => "Expresso", "y" => $subscribersExpresso, "drilldown" => "networkExpresso")]);
        $chartArray["drilldown"] = array("series" => [
                
            //Mtn drilldowns
            array("id" => "networkMtn", "name" => "Mtn By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersMtn1519, "drilldown" => "mtnage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersMtn2024, "drilldown" => "mtnage2024")]),
            
            array("id" => "mtnage014", "name" => "Mtn : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersMtn014male, "drilldown" => "mtnmaleage014"), array("name" => "Female", "y" => $subscribersMtn014female, "drilldown" => "mtnfemaleage014")]),
                array("name" => "Mtn : 0-14 yrs : Male By Education Level", "id" => "mtnmaleage014", "data" => [['JHS', $subscribersMtn014malejhs], ['SHS', $subscribersMtn014maleshs], ['Tertiary', $subscribersMtn014maleter], ["Not In School", $subscribersMtn014malena]]),
                array("name" => "Mtn : 0-14 yrs : Female By Education Level", "id" => "mtnfemaleage014", "data" => [['JHS', $subscribersMtn014femalejhs], ['SHS', $subscribersMtn014femaleshs], ['Tertiary', $subscribersMtn014femaleter], ["Not In School", $subscribersMtn014femalena]]),
                
            array("id" => "mtnage1519", "name" => "Mtn : 15-19 yrs By  Gender", "data" => [array("name" => "Male", "y" => $subscribersMtn1519male, "drilldown" => "mtnmaleage1519"), array("name" => "Female", "y" => $subscribersMtn1519female, "drilldown" => "mtnfemaleage1519")]),
                array("name" => "Mtn : 15-19 yrs: Male By Education Level", "id" => "mtnmaleage1519", "data" => [['JHS', $subscribersMtn1519malejhs], ['SHS', $subscribersMtn1519maleshs], ['Tertiary', $subscribersMtn1519maleter], ["Not In School", $subscribersMtn1519malena]]),
                array("name" => "Mtn : 15-19 yrs : Female By Education Level", "id" => "mtnfemaleage1519", "data" => [['JHS', $subscribersMtn1519femalejhs], ['SHS', $subscribersMtn1519femaleshs], ['Tertiary', $subscribersMtn1519femaleter], ["Not In School", $subscribersMtn1519femalena]]),
                
            array("id" => "mtnage2024", "name" => "Mtn : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersMtn2024male, "drilldown" => "mtnmaleage2024"), array("name" => "Female", "y" => $subscribersMtn2024female, "drilldown" => "mtnfemaleage2024")]),
                array("name" => "Mtn : 20-24 yrs : Male By Education Level", "id" => "mtnmaleage2024", "data" => [['JHS', $subscribersMtn2024malejhs], ['SHS', $subscribersMtn2024maleshs], ['Tertiary', $subscribersMtn2024maleter], ["Not In School", $subscribersMtn2024malena]]),
                array("name" => "Mtn : 20-24 yrs : Female By Education Level", "id" => "mtnfemaleage2024", "data" => [['JHS', $subscribersMtn2024femalejhs], ['SHS', $subscribersMtn2024femaleshs], ['Tertiary', $subscribersMtn2024femaleter], ["Not In School", $subscribersMtn2024femalena]]),
                
            array("id" => "mtnage25", "name" => "Mtn : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersMtn25male, "drilldown" => "mtnmaleage25"), array("name" => "Female", "y" => $subscribersMtn25female, "drilldown" => "mtnfemaleage25")]),
                array("name" => "Mtn : 25+ yrs : Male By Education Level", "id" => "mtnmaleage25", "data" => [['JHS', $subscribersMtn25malejhs], ['SHS', $subscribersMtn25maleshs], ['Tertiary', $subscribersMtn25maleter], ["Not In School", $subscribersMtn25malena]]),
                array("name" => "Mtn : 25+ yrs : Female By Education Level", "id" => "mtnfemaleage25", "data" => [['JHS', $subscribersMtn25femalejhs], ['SHS', $subscribersMtn25femaleshs], ['Tertiary', $subscribersMtn25femaleter], ["Not In School", $subscribersMtn25femalena]]),
            
            
            //Tigo drilldowns
            array("id" => "networkTigo", "name" => "Tigo : Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersTigo1519, "drilldown" => "tigoage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersTigo2024, "drilldown" => "tigoage2024")]),
            
            array("id" => "tigoage014", "name" => "Tigo : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersTigo014male, "drilldown" => "tigomaleage014"), array("name" => "Female", "y" => $subscribersTigo014female, "drilldown" => "tigofemaleage014")]),
                array("name" => "Tigo : 0-14 yrs : Male By Education Level", "id" => "tigomaleage014", "data" => [['JHS', $subscribersTigo014malejhs], ['SHS', $subscribersTigo014maleshs], ['Tertiary', $subscribersTigo014maleter], ["Not In School", $subscribersTigo014malena]]),
                array("name" => "Tigo : 0-14 yrs : Female By Education Level", "id" => "tigofemaleage014", "data" => [['JHS', $subscribersTigo014femalejhs], ['SHS', $subscribersTigo014femaleshs], ['Tertiary', $subscribersTigo014femaleter], ["Not In School", $subscribersTigo014femalena]]),
                
            array("id" => "tigoage1519", "name" => "Tigo : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersTigo1519male, "drilldown" => "tigomaleage1519"), array("name" => "Female", "y" => $subscribersTigo1519female, "drilldown" => "tigofemaleage1519")]),
                array("name" => "Tigo : 15-19 yrs : Male By Education Level ", "id" => "tigomaleage1519", "data" => [['JHS', $subscribersTigo1519malejhs], ['SHS', $subscribersTigo1519maleshs], ['Tertiary', $subscribersTigo1519maleter], ["Not In School", $subscribersTigo1519malena]]),
                array("name" => "Tigo : 15-19 yrs : Female By Education Level", "id" => "tigofemaleage1519", "data" => [['JHS', $subscribersTigo1519femalejhs], ['SHS', $subscribersTigo1519femaleshs], ['Tertiary', $subscribersTigo1519femaleter], ["Not In School", $subscribersTigo1519femalena]]),
                
            array("id" => "tigoage2024", "name" => "Tigo : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersTigo2024male, "drilldown" => "tigomaleage2024"), array("name" => "Female", "y" => $subscribersTigo2024female, "drilldown" => "tigofemaleage2024")]),
                array("name" => "Tigo : 20-24 yrs : Male By Education Level", "id" => "tigomaleage2024", "data" => [['JHS', $subscribersTigo2024malejhs], ['SHS', $subscribersTigo2024maleshs], ['Tertiary', $subscribersTigo2024maleter], ["Not In School", $subscribersTigo2024malena]]),
                array("name" => "Tigo : 20-24 yrs : Female By Education Level", "id" => "tigofemaleage2024", "data" => [['JHS', $subscribersTigo2024femalejhs], ['SHS', $subscribersTigo2024femaleshs], ['Tertiary', $subscribersTigo2024femaleter], ["Not In School", $subscribersTigo2024femalena]]),
                
            array("id" => "tigoage25", "name" => "Tigo : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersTigo25male, "drilldown" => "tigomaleage25"), array("name" => "Female", "y" => $subscribersTigo25female, "drilldown" => "tigofemaleage25")]),
                array("name" => "Tigo : 25+ yrs : Male  By Education Level", "id" => "tigomaleage25", "data" => [['JHS', $subscribersTigo25malejhs], ['SHS', $subscribersTigo25maleshs], ['Tertiary', $subscribersTigo25maleter], ["Not In School", $subscribersTigo25malena]]),
                array("name" => "Tigo :  25+ yrs : Female By Education Level", "id" => "tigofemaleage25", "data" => [['JHS', $subscribersTigo25femalejhs], ['SHS', $subscribersTigo25femaleshs], ['Tertiary', $subscribersTigo25femaleter], ["Not In School", $subscribersTigo25femalena]]),
            

            //Airtel drilldowns
            
            array("id" => "networkAirtel", "name" => "Airtel By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersAirtel1519, "drilldown" => "airtelage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersAirtel2024, "drilldown" => "airtelage2024")]),
            
            array("id" => "airtelage014", "name" => "Airtel : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersAirtel014male, "drilldown" => "airtelmaleage014"), array("name" => "Female", "y" => $subscribersAirtel014female, "drilldown" => "airtelfemaleage014")]),
                array("name" => "Airtel : 0-14 yrs : Male By Education Level", "id" => "airtelmaleage014", "data" => [['JHS', $subscribersAirtel014malejhs], ['SHS', $subscribersAirtel014maleshs], ['Tertiary', $subscribersAirtel014maleter], ["Not In School", $subscribersAirtel014malena]]),
                array("name" => "Airtel : 0-14 yrs : Female By Education Level", "id" => "airtelfemaleage014", "data" => [['JHS', $subscribersAirtel014femalejhs], ['SHS', $subscribersAirtel014femaleshs], ['Tertiary', $subscribersAirtel014femaleter], ["Not In School", $subscribersAirtel014femalena]]),
                
            array("id" => "airtelage1519", "name" => "Airtel : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersAirtel1519male, "drilldown" => "airtelmaleage1519"), array("name" => "Female", "y" => $subscribersAirtel1519female, "drilldown" => "airtelfemaleage1519")]),
                array("name" => "Airtel : 15-19 yrs : Male By Education Level", "id" => "airtelmaleage1519", "data" => [['JHS', $subscribersAirtel1519malejhs], ['SHS', $subscribersAirtel1519maleshs], ['Tertiary', $subscribersAirtel1519maleter], ["Not In School", $subscribersAirtel1519malena]]),
                array("name" => "Airtel : 15-19 yrs : Female By Education Level", "id" => "airtelfemaleage1519", "data" => [['JHS', $subscribersAirtel1519femalejhs], ['SHS', $subscribersAirtel1519femaleshs], ['Tertiary', $subscribersAirtel1519femaleter], ["Not In School", $subscribersAirtel1519femalena]]),
                
            array("id" => "airtelage2024", "name" => "Airtel : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersAirtel2024male, "drilldown" => "airtelmaleage2024"), array("name" => "Female", "y" => $subscribersAirtel2024female, "drilldown" => "airtelfemaleage2024")]),
                array("name" => "Airtel : 20-24 yrs : Male By Education Level", "id" => "airtelmaleage2024", "data" => [['JHS', $subscribersAirtel2024malejhs], ['SHS', $subscribersAirtel2024maleshs], ['Tertiary', $subscribersAirtel2024maleter], ["Not In School", $subscribersAirtel2024malena]]),
                array("name" => "Airtel : 20-24 yrs : Female By Education Level", "id" => "airtelfemaleage2024", "data" => [['JHS', $subscribersAirtel2024femalejhs], ['SHS', $subscribersAirtel2024femaleshs], ['Tertiary', $subscribersAirtel2024femaleter], ["Not In School", $subscribersAirtel2024femalena]]),
                
            array("id" => "airtelage25", "name" => "Airtel : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersAirtel25male, "drilldown" => "airtelmaleage25"), array("name" => "Female", "y" => $subscribersAirtel25female, "drilldown" => "airtelfemaleage25")]),
                array("name" => "Airtel : 25+ yrs : Male By Education Level", "id" => "airtelmaleage25", "data" => [['JHS', $subscribersAirtel25malejhs], ['SHS', $subscribersAirtel25maleshs], ['Tertiary', $subscribersAirtel25maleter], ["Not In School", $subscribersAirtel25malena]]),
                array("name" => "Airtel : 25+ yrs : Female By Education Level", "id" => "airtelfemaleage25", "data" => [['JHS', $subscribersAirtel25femalejhs], ['SHS', $subscribersAirtel25femaleshs], ['Tertiary', $subscribersAirtel25femaleter], ["Not In School", $subscribersAirtel25femalena]]),
            
         
            //Vodafone drilldowns
            
            array("id" => "networkVodafone", "name" => "Vodafone By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersVodafone1519, "drilldown" => "vodafoneage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersVodafone2024, "drilldown" => "vodafoneage2024")]),
            
            array("id" => "vodafoneage014", "name" => "Vodafone : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersVodafone014male, "drilldown" => "vodafonemaleage014"), array("name" => "Female", "y" => $subscribersVodafone014female, "drilldown" => "vodafonefemaleage014")]),
                array("name" => "Vodafone : 0-14 yrs : Male By Education Level", "id" => "vodafonemaleage014", "data" => [['JHS', $subscribersVodafone014malejhs], ['SHS', $subscribersVodafone014maleshs], ['Tertiary', $subscribersVodafone014maleter], ["Not In School", $subscribersVodafone014malena]]),
                array("name" => "Vodafone : 0-14 yrs : Female By Education Level", "id" => "vodafonefemaleage014", "data" => [['JHS', $subscribersVodafone014femalejhs], ['SHS', $subscribersVodafone014femaleshs], ['Tertiary', $subscribersVodafone014femaleter], ["Not In School", $subscribersVodafone014femalena]]),
                
            array("id" => "vodafoneage1519", "name" => "Vodafone : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersVodafone1519male, "drilldown" => "vodafonemaleage1519"), array("name" => "Female", "y" => $subscribersVodafone1519female, "drilldown" => "vodafonefemaleage1519")]),
                array("name" => "Vodafone : 15-19 yrs : Male By Education Level", "id" => "vodafonemaleage1519", "data" => [['JHS', $subscribersVodafone1519malejhs], ['SHS', $subscribersVodafone1519maleshs], ['Tertiary', $subscribersVodafone1519maleter], ["Not In School", $subscribersVodafone1519malena]]),
                array("name" => "Vodafone : 15-19 yrs : Female By Education Level", "id" => "vodafonefemaleage1519", "data" => [['JHS', $subscribersVodafone1519femalejhs], ['SHS', $subscribersVodafone1519femaleshs], ['Tertiary', $subscribersVodafone1519femaleter], ["Not In School", $subscribersVodafone1519femalena]]),
                
            array("id" => "vodafoneage2024", "name" => "Vodafone : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersVodafone2024male, "drilldown" => "vodafonemaleage2024"), array("name" => "Female", "y" => $subscribersVodafone2024female, "drilldown" => "vodafonefemaleage2024")]),
                array("name" => "Vodafone : 20-24 yrs : Male By Education Level", "id" => "vodafonemaleage2024", "data" => [['JHS', $subscribersVodafone2024malejhs], ['SHS', $subscribersVodafone2024maleshs], ['Tertiary', $subscribersVodafone2024maleter], ["Not In School", $subscribersVodafone2024malena]]),
                array("name" => "Vodafone : 20-24 yrs : Female By Education Level", "id" => "vodafonefemaleage2024", "data" => [['JHS', $subscribersVodafone2024femalejhs], ['SHS', $subscribersVodafone2024femaleshs], ['Tertiary', $subscribersVodafone2024femaleter], ["Not In School", $subscribersVodafone2024femalena]]),
                
            array("id" => "vodafoneage25", "name" => "Vodafone : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersVodafone25male, "drilldown" => "vodafonemaleage25"), array("name" => "Female", "y" => $subscribersVodafone25female, "drilldown" => "vodafonefemaleage25")]),
                array("name" => "Vodafone : 25+ yrs : Male By Education Level", "id" => "vodafonemaleage25", "data" => [['JHS', $subscribersVodafone25malejhs], ['SHS', $subscribersVodafone25maleshs], ['Tertiary', $subscribersVodafone25maleter], ["Not In School", $subscribersVodafone25malena]]),
                array("name" => "Vodafone : 25+ yrs : Female By Education Level", "id" => "vodafonefemaleage25", "data" => [['JHS', $subscribersVodafone25femalejhs], ['SHS', $subscribersVodafone25femaleshs], ['Tertiary', $subscribersVodafone25femaleter], ["Not In School", $subscribersVodafone25femalena]]),
            

            //Glo drilldowns
            
            array("id" => "networkGlo", "name" => "Glo By Age Groups", "data" => [
                                                                    array("name" => "15-19 yrs", "y" => $subscribersGlo1519, "drilldown" => "gloage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersGlo2024, "drilldown" => "gloage2024")]),
            
            array("id" => "gloage014", "name" => "Glo : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersGlo014male, "drilldown" => "glomaleage014"), array("name" => "Female", "y" => $subscribersGlo014female, "drilldown" => "glofemaleage014")]),
                array("name" => "Glo : 0-14 yrs : Male By Education Level", "id" => "glomaleage014", "data" => [['JHS', $subscribersGlo014malejhs], ['SHS', $subscribersGlo014maleshs], ['Tertiary', $subscribersGlo014maleter], ["Not In School", $subscribersGlo014malena]]),
                array("name" => "Glo : 0-14 yrs : Female By Education Level", "id" => "glofemaleage014", "data" => [['JHS', $subscribersGlo014femalejhs], ['SHS', $subscribersGlo014femaleshs], ['Tertiary', $subscribersGlo014femaleter], ["Not In School", $subscribersGlo014femalena]]),
                
            array("id" => "gloage1519", "name" => "Glo : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersGlo1519male, "drilldown" => "glomaleage1519"), array("name" => "Female", "y" => $subscribersGlo1519female, "drilldown" => "glofemaleage1519")]),
                array("name" => "Glo : 15-19 yrs : Male By Education Level", "id" => "glomaleage1519", "data" => [['JHS', $subscribersGlo1519malejhs], ['SHS', $subscribersGlo1519maleshs], ['Tertiary', $subscribersGlo1519maleter], ["Not In School", $subscribersGlo1519malena]]),
                array("name" => "Glo : 15-19 yrs : Female By Education Level", "id" => "glofemaleage1519", "data" => [['JHS', $subscribersGlo1519femalejhs], ['SHS', $subscribersGlo1519femaleshs], ['Tertiary', $subscribersGlo1519femaleter], ["Not In School", $subscribersGlo1519femalena]]),
                
            array("id" => "gloage2024", "name" => "Glo : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersGlo2024male, "drilldown" => "glomaleage2024"), array("name" => "Female", "y" => $subscribersGlo2024female, "drilldown" => "glofemaleage2024")]),
                array("name" => "Glo : 20-24 yrs : Male By Education Level", "id" => "glomaleage2024", "data" => [['JHS', $subscribersGlo2024malejhs], ['SHS', $subscribersGlo2024maleshs], ['Tertiary', $subscribersGlo2024maleter], ["Not In School", $subscribersGlo2024malena]]),
                array("name" => "Glo : 20-24 yrs : Female By Education Level", "id" => "glofemaleage2024", "data" => [['JHS', $subscribersGlo2024femalejhs], ['SHS', $subscribersGlo2024femaleshs], ['Tertiary', $subscribersGlo2024femaleter], ["Not In School", $subscribersGlo2024femalena]]),
                
            array("id" => "gloage25", "name" => "Glo : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersGlo25male, "drilldown" => "glomaleage25"), array("name" => "Female", "y" => $subscribersGlo25female, "drilldown" => "glofemaleage25")]),
                array("name" => "Glo : 25+ yrs : Male By Education Level", "id" => "glomaleage25", "data" => [['JHS', $subscribersGlo25malejhs], ['SHS', $subscribersGlo25maleshs], ['Tertiary', $subscribersGlo25maleter], ["Not In School", $subscribersGlo25malena]]),
                array("name" => "Glo : 25+ yrs : Female By Education Level", "id" => "glofemaleage25", "data" => [['JHS', $subscribersGlo25femalejhs], ['SHS', $subscribersGlo25femaleshs], ['Tertiary', $subscribersGlo25femaleter], ["Not In School", $subscribersGlo25femalena]]),
            

            //Expresso drilldowns
            
            array("id" => "networkExpresso", "name" => "Expresso By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersExpresso1519, "drilldown" => "expressoage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersExpresso2024, "drilldown" => "expressoage2024")]),
            
            array("id" => "expressoage014", "name" => "Expresso : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersExpresso014male, "drilldown" => "expressomaleage014"), array("name" => "Female", "y" => $subscribersExpresso014female, "drilldown" => "expressofemaleage014")]),
                array("name" => "Expresso : 0-14 yrs : Male By Education Level", "id" => "expressomaleage014", "data" => [['JHS', $subscribersExpresso014malejhs], ['SHS', $subscribersExpresso014maleshs], ['Tertiary', $subscribersExpresso014maleter], ["Not In School", $subscribersExpresso014malena]]),
                array("name" => "Expresso : 0-14 yrs : Female By Education Level", "id" => "expressofemaleage014", "data" => [['JHS', $subscribersExpresso014femalejhs], ['SHS', $subscribersExpresso014femaleshs], ['Tertiary', $subscribersExpresso014femaleter], ["Not In School", $subscribersExpresso014femalena]]),
                
            array("id" => "expressoage1519", "name" => "Expresso : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersExpresso1519male, "drilldown" => "expressomaleage1519"), array("name" => "Female", "y" => $subscribersExpresso1519female, "drilldown" => "expressofemaleage1519")]),
                array("name" => "Expresso : 15-19 yrs : Male By Education Level", "id" => "expressomaleage1519", "data" => [['JHS', $subscribersExpresso1519malejhs], ['SHS', $subscribersExpresso1519maleshs], ['Tertiary', $subscribersExpresso1519maleter], ["Not In School", $subscribersExpresso1519malena]]),
                array("name" => "Expresso : 15-19 yrs : Female By Education Level", "id" => "expressofemaleage1519", "data" => [['JHS', $subscribersExpresso1519femalejhs], ['SHS', $subscribersExpresso1519femaleshs], ['Tertiary', $subscribersExpresso1519femaleter], ["Not In School", $subscribersExpresso1519femalena]]),
                
            array("id" => "expressoage2024", "name" => "Expresso : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersExpresso2024male, "drilldown" => "expressomaleage2024"), array("name" => "Female", "y" => $subscribersExpresso2024female, "drilldown" => "expressofemaleage2024")]),
                array("name" => "Expresso : 20-24 yrs : Male By Education Level", "id" => "expressomaleage2024", "data" => [['JHS', $subscribersExpresso2024malejhs], ['SHS', $subscribersExpresso2024maleshs], ['Tertiary', $subscribersExpresso2024maleter], ["Not In School", $subscribersExpresso2024malena]]),
                array("name" => "Expresso : 20-24 yrs : Female By Education Level", "id" => "expressofemaleage2024", "data" => [['JHS', $subscribersExpresso2024femalejhs], ['SHS', $subscribersExpresso2024femaleshs], ['Tertiary', $subscribersExpresso2024femaleter], ["Not In School", $subscribersExpresso2024femalena]]),
                
            array("id" => "expressoage25", "name" => "Expresso : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersExpresso25male, "drilldown" => "expressomaleage25"), array("name" => "Female", "y" => $subscribersExpresso25female, "drilldown" => "expressofemaleage25")]),
                array("name" => "Expresso : 25+ yrs : Male By Education Level", "id" => "expressomaleage25", "data" => [['JHS', $subscribersExpresso25malejhs], ['SHS', $subscribersExpresso25maleshs], ['Tertiary', $subscribersExpresso25maleter], ["Not In School", $subscribersExpresso25malena]]),
                array("name" => "Expresso : 25+ yrs : Female By Education Level", "id" => "expressofemaleage25", "data" => [['JHS', $subscribersExpresso25femalejhs], ['SHS', $subscribersExpresso25femaleshs], ['Tertiary', $subscribersExpresso25femaleter], ["Not In School", $subscribersExpresso25femalena]])
            

            
            ]);

        return $chartArray;
    }
    
     public function getSubscribersBySourceChart() {
        
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

         //Subscribers with source GF
        $sqlGF = 'status IN ("LongCode","Completed") and' . " source = 'GF' ";
        $subscribersGF = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF)
                ->count();


        //Subscribers registered with source GF and between 0-14 yrs
        $subscribersGF014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014)
                ->count();

        //Male Subscribers registered with source GF and between 0-14 yrs
        $subscribersGF014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source GF and between 0-14 yrs in Jhs
        $subscribersGF014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source GF and between 0-14 yrs in Shs
        $subscribersGF014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source GF and between 0-14 yrs in Tertiary
        $subscribersGF014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source GF and between 0-14 yrs not in school
        $subscribersGF014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source GF and between 0-14 yrs
        $subscribersGF014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source GF and between 0-14 yrs in Jhs
        $subscribersGF014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source GF and between 0-14 yrs in Shs
        $subscribersGF014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source GF and between 0-14 yrs in Tertiary
        $subscribersGF014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source GF and between 0-14 yrs not in school
        $subscribersGF014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source GF and between 15-19 yrs
        $subscribersGF1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519)
                ->count();

        //Male Subscribers registered with source GF and between 15-19 yrs
        $subscribersGF1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source GF and between 15-19 yrs in Jhs
        $subscribersGF1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source GF and between 15-19 yrs in Shs
        $subscribersGF1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source GF and between 15-19 yrs in Tertiary
        $subscribersGF1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source GF and between 15-19 yrs not in school
        $subscribersGF1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source GF and between 15-19 yrs
        $subscribersGF1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source GF and between 15-19 yrs in Jhs
        $subscribersGF1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source GF and between 15-19 yrs in Shs
        $subscribersGF1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source GF and between 15-19 yrs in Tertiary
        $subscribersGF1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source GF and between 15-19 yrs not in school
        $subscribersGF1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source GF and between 20-24 yrs 
        $subscribersGF2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024)
                ->count();

        //Male Subscribers registered with source GF and between 20-24 yrs
        $subscribersGF2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source GF and between 20-24 yrs in Jhs
        $subscribersGF2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source GF and between 20-24 yrs in Shs
        $subscribersGF2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source GF and between 20-24 yrs in Tertiary
        $subscribersGF2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source GF and between 20-24 yrs not in school
        $subscribersGF2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source GF and between 20-24 yrs
        $subscribersGF2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source GF and between 20-24 yrs in Jhs
        $subscribersGF2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source GF and between 20-24 yrs in Shs
        $subscribersGF2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source GF and between 20-24 yrs in Tertiary
        $subscribersGF2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source GF and between 20-24 yrs not in school
        $subscribersGF2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source GF and between 25+ yrs 
        $subscribersGF25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25)
                ->count();

        //Male Subscribers registered with source GF and between 25+ yrs
        $subscribersGF25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source GF and between 25+ yrs in Jhs
        $subscribersGF25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source GF and between 25+ yrs in Shs
        $subscribersGF25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source GF and between 25+ yrs in Tertiary
        $subscribersGF25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source GF and between 25+ yrs not in school
        $subscribersGF25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source GF and between 25+ yrs
        $subscribersGF25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source GF and between 25+ yrs in Jhs
        $subscribersGF25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source GF and between 25+ yrs in Shs
        $subscribersGF25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source GF and between 25+ yrs in Tertiary
        $subscribersGF25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source GF and between 25+ yrs not in school
        $subscribersGF25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlGF . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();


        //Next Source : DKT
        //Subscribers with source DKT
        $sqlDKT = 'status IN ("LongCode","Completed") and' . " source = 'DKT' ";
        $subscribersDKT = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT)
                ->count();


        //Subscribers registered with source DKT and between 0-14 yrs
        $subscribersDKT014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014)
                ->count();

        //Male Subscribers registered with source DKT and between 0-14 yrs
        $subscribersDKT014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source DKT and between 0-14 yrs in Jhs
        $subscribersDKT014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source DKT and between 0-14 yrs in Shs
        $subscribersDKT014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source DKT and between 0-14 yrs in Tertiary
        $subscribersDKT014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source DKT and between 0-14 yrs not in school
        $subscribersDKT014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source DKT and between 0-14 yrs
        $subscribersDKT014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source DKT and between 0-14 yrs in Jhs
        $subscribersDKT014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source DKT and between 0-14 yrs in Shs
        $subscribersDKT014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source DKT and between 0-14 yrs in Tertiary
        $subscribersDKT014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source DKT and between 0-14 yrs not in school
        $subscribersDKT014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source DKT and between 15-19 yrs
        $subscribersDKT1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519)
                ->count();

        //Male Subscribers registered with source DKT and between 15-19 yrs
        $subscribersDKT1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source DKT and between 15-19 yrs in Jhs
        $subscribersDKT1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source DKT and between 15-19 yrs in Shs
        $subscribersDKT1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source DKT and between 15-19 yrs in Tertiary
        $subscribersDKT1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source DKT and between 15-19 yrs not in school
        $subscribersDKT1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source DKT and between 15-19 yrs
        $subscribersDKT1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source DKT and between 15-19 yrs in Jhs
        $subscribersDKT1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source DKT and between 15-19 yrs in Shs
        $subscribersDKT1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source DKT and between 15-19 yrs in Tertiary
        $subscribersDKT1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source DKT and between 15-19 yrs not in school
        $subscribersDKT1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source DKT and between 20-24 yrs 
        $subscribersDKT2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024)
                ->count();

        //Male Subscribers registered with source DKT and between 20-24 yrs
        $subscribersDKT2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source DKT and between 20-24 yrs in Jhs
        $subscribersDKT2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source DKT and between 20-24 yrs in Shs
        $subscribersDKT2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source DKT and between 20-24 yrs in Tertiary
        $subscribersDKT2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source DKT and between 20-24 yrs not in school
        $subscribersDKT2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source DKT and between 20-24 yrs
        $subscribersDKT2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source DKT and between 20-24 yrs in Jhs
        $subscribersDKT2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source DKT and between 20-24 yrs in Shs
        $subscribersDKT2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source DKT and between 20-24 yrs in Tertiary
        $subscribersDKT2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source DKT and between 20-24 yrs not in school
        $subscribersDKT2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source DKT and between 25+ yrs 
        $subscribersDKT25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25)
                ->count();

        //Male Subscribers registered with source DKT and between 25+ yrs
        $subscribersDKT25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source DKT and between 25+ yrs in Jhs
        $subscribersDKT25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source DKT and between 25+ yrs in Shs
        $subscribersDKT25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source DKT and between 25+ yrs in Tertiary
        $subscribersDKT25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source DKT and between 25+ yrs not in school
        $subscribersDKT25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source DKT and between 25+ yrs
        $subscribersDKT25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source DKT and between 25+ yrs in Jhs
        $subscribersDKT25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source DKT and between 25+ yrs in Shs
        $subscribersDKT25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source DKT and between 25+ yrs in Tertiary
        $subscribersDKT25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source DKT and between 25+ yrs not in school
        $subscribersDKT25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlDKT . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Next Source : MSI
        //Subscribers with source MSI
        $sqlMSI = 'status IN ("LongCode","Completed") and' . " source ='MSI' ";
        $subscribersMSI = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI)
                ->count();


        //Subscribers registered with source MSI and between 0-14 yrs
        $subscribersMSI014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014)
                ->count();

        //Male Subscribers registered with source MSI and between 0-14 yrs
        $subscribersMSI014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source MSI and between 0-14 yrs in Jhs
        $subscribersMSI014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source MSI and between 0-14 yrs in Shs
        $subscribersMSI014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source MSI and between 0-14 yrs in Tertiary
        $subscribersMSI014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source MSI and between 0-14 yrs not in school
        $subscribersMSI014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source MSI and between 0-14 yrs
        $subscribersMSI014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source MSI and between 0-14 yrs in Jhs
        $subscribersMSI014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source MSI and between 0-14 yrs in Shs
        $subscribersMSI014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source MSI and between 0-14 yrs in Tertiary
        $subscribersMSI014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source MSI and between 0-14 yrs not in school
        $subscribersMSI014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source MSI and between 15-19 yrs
        $subscribersMSI1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519)
                ->count();

        //Male Subscribers registered with source MSI and between 15-19 yrs
        $subscribersMSI1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source MSI and between 15-19 yrs in Jhs
        $subscribersMSI1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source MSI and between 15-19 yrs in Shs
        $subscribersMSI1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source MSI and between 15-19 yrs in Tertiary
        $subscribersMSI1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source MSI and between 15-19 yrs not in school
        $subscribersMSI1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source MSI and between 15-19 yrs
        $subscribersMSI1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source MSI and between 15-19 yrs in Jhs
        $subscribersMSI1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source MSI and between 15-19 yrs in Shs
        $subscribersMSI1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source MSI and between 15-19 yrs in Tertiary
        $subscribersMSI1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source MSI and between 15-19 yrs not in school
        $subscribersMSI1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source MSI and between 20-24 yrs 
        $subscribersMSI2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024)
                ->count();

        //Male Subscribers registered with source MSI and between 20-24 yrs
        $subscribersMSI2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source MSI and between 20-24 yrs in Jhs
        $subscribersMSI2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source MSI and between 20-24 yrs in Shs
        $subscribersMSI2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source MSI and between 20-24 yrs in Tertiary
        $subscribersMSI2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source MSI and between 20-24 yrs not in school
        $subscribersMSI2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source MSI and between 20-24 yrs
        $subscribersMSI2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source MSI and between 20-24 yrs in Jhs
        $subscribersMSI2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source MSI and between 20-24 yrs in Shs
        $subscribersMSI2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source MSI and between 20-24 yrs in Tertiary
        $subscribersMSI2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source MSI and between 20-24 yrs not in school
        $subscribersMSI2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with source MSI and between 25+ yrs 
        $subscribersMSI25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25)
                ->count();

        //Male Subscribers registered with source MSI and between 25+ yrs
        $subscribersMSI25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with source MSI and between 25+ yrs in Jhs
        $subscribersMSI25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with source MSI and between 25+ yrs in Shs
        $subscribersMSI25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with source MSI and between 25+ yrs in Tertiary
        $subscribersMSI25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with source MSI and between 25+ yrs not in school
        $subscribersMSI25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with source MSI and between 25+ yrs
        $subscribersMSI25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with source MSI and between 25+ yrs in Jhs
        $subscribersMSI25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with source MSI and between 25+ yrs in Shs
        $subscribersMSI25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with source MSI and between 25+ yrs in Tertiary
        $subscribersMSI25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with source MSI and between 25+ yrs not in school
        $subscribersMSI25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlMSI . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Next Source: JamJar
        //Subscribers with JamJar
        $sqlJamJar = 'status IN ("LongCode","Completed") and' . " source = 'JamJar' ";
        $subscribersJamJar = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar)
                ->count();


        //Subscribers registered with Jamjar and between 0-14 yrs
        $subscribersJamJar014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014)
                ->count();

        //Male Subscribers registered with Jamjar and between 0-14 yrs
        $subscribersJamJar014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Jamjar and between 0-14 yrs in Jhs
        $subscribersJamJar014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Jamjar and between 0-14 yrs in Shs
        $subscribersJamJar014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Jamjar and between 0-14 yrs in Tertiary
        $subscribersJamJar014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Jamjar and between 0-14 yrs not in school
        $subscribersJamJar014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Jamjar and between 0-14 yrs
        $subscribersJamJar014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Jamjar and between 0-14 yrs in Jhs
        $subscribersJamJar014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Jamjar and between 0-14 yrs in Shs
        $subscribersJamJar014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Jamjar and between 0-14 yrs in Tertiary
        $subscribersJamJar014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Jamjar and between 0-14 yrs not in school
        $subscribersJamJar014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Jamjar and between 15-19 yrs
        $subscribersJamJar1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519)
                ->count();

        //Male Subscribers registered with Jamjar and between 15-19 yrs
        $subscribersJamJar1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Jamjar and between 15-19 yrs in Jhs
        $subscribersJamJar1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Jamjar and between 15-19 yrs in Shs
        $subscribersJamJar1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Jamjar and between 15-19 yrs in Tertiary
        $subscribersJamJar1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Jamjar and between 15-19 yrs not in school
        $subscribersJamJar1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Jamjar and between 15-19 yrs
        $subscribersJamJar1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Jamjar and between 15-19 yrs in Jhs
        $subscribersJamJar1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Jamjar and between 15-19 yrs in Shs
        $subscribersJamJar1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Jamjar and between 15-19 yrs in Tertiary
        $subscribersJamJar1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Jamjar and between 15-19 yrs not in school
        $subscribersJamJar1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Jamjar and between 20-24 yrs 
        $subscribersJamJar2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024)
                ->count();

        //Male Subscribers registered with Jamjar and between 20-24 yrs
        $subscribersJamJar2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Jamjar and between 20-24 yrs in Jhs
        $subscribersJamJar2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Jamjar and between 20-24 yrs in Shs
        $subscribersJamJar2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Jamjar and between 20-24 yrs in Tertiary
        $subscribersJamJar2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Jamjar and between 20-24 yrs not in school
        $subscribersJamJar2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Jamjar and between 20-24 yrs
        $subscribersJamJar2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Jamjar and between 20-24 yrs in Jhs
        $subscribersJamJar2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Jamjar and between 20-24 yrs in Shs
        $subscribersJamJar2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Jamjar and between 20-24 yrs in Tertiary
        $subscribersJamJar2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Jamjar and between 20-24 yrs not in school
        $subscribersJamJar2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with Jamjar and between 25+ yrs 
        $subscribersJamJar25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25)
                ->count();

        //Male Subscribers registered with Jamjar and between 25+ yrs
        $subscribersJamJar25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with Jamjar and between 25+ yrs in Jhs
        $subscribersJamJar25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with Jamjar and between 25+ yrs in Shs
        $subscribersJamJar25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with Jamjar and between 25+ yrs in Tertiary
        $subscribersJamJar25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with Jamjar and between 25+ yrs not in school
        $subscribersJamJar25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with Jamjar and between 25+ yrs
        $subscribersJamJar25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with Jamjar and between 25+ yrs in Jhs
        $subscribersJamJar25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with Jamjar and between 25+ yrs in Shs
        $subscribersJamJar25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with Jamjar and between 25+ yrs in Tertiary
        $subscribersJamJar25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with Jamjar and between 25+ yrs not in school
        $subscribersJamJar25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlJamJar . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Next Source : None
        //Subscribers with no source 
        $sqlNone = 'status IN ("LongCode","Completed") and' . " ISNULL(source) or source = '' ";
        $subscribersNone = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone)
                ->count();


        //Subscribers registered with no source  and between 0-14 yrs
        $subscribersNone014 = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014)
                ->count();

        //Male Subscribers registered with no source  and between 0-14 yrs
        $subscribersNone014male = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with no source  and between 0-14 yrs in Jhs
        $subscribersNone014malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with no source  and between 0-14 yrs in Shs
        $subscribersNone014maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with no source  and between 0-14 yrs in Tertiary
        $subscribersNone014maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with no source  and between 0-14 yrs not in school
        $subscribersNone014malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with no source  and between 0-14 yrs
        $subscribersNone014female = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with no source  and between 0-14 yrs in Jhs
        $subscribersNone014femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with no source  and between 0-14 yrs in Shs
        $subscribersNone014femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with no source  and between 0-14 yrs in Tertiary
        $subscribersNone014femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with no source  and between 0-14 yrs not in school
        $subscribersNone014femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql014 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with no source  and between 15-19 yrs
        $subscribersNone1519 = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519)
                ->count();

        //Male Subscribers registered with no source  and between 15-19 yrs
        $subscribersNone1519male = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with no source  and between 15-19 yrs in Jhs
        $subscribersNone1519malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with no source  and between 15-19 yrs in Shs
        $subscribersNone1519maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with no source  and between 15-19 yrs in Tertiary
        $subscribersNone1519maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with no source  and between 15-19 yrs not in school
        $subscribersNone1519malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with no source  and between 15-19 yrs
        $subscribersNone1519female = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with no source  and between 15-19 yrs in Jhs
        $subscribersNone1519femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with no source  and between 15-19 yrs in Shs
        $subscribersNone1519femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with no source  and between 15-19 yrs in Tertiary
        $subscribersNone1519femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with no source  and between 15-19 yrs not in school
        $subscribersNone1519femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql1519 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with no source  and between 20-24 yrs 
        $subscribersNone2024 = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024)
                ->count();

        //Male Subscribers registered with no source  and between 20-24 yrs
        $subscribersNone2024male = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with no source  and between 20-24 yrs in Jhs
        $subscribersNone2024malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with no source  and between 20-24 yrs in Shs
        $subscribersNone2024maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with no source  and between 20-24 yrs in Tertiary
        $subscribersNone2024maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with no source  and between 20-24 yrs not in school
        $subscribersNone2024malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with no source  and between 20-24 yrs
        $subscribersNone2024female = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with no source  and between 20-24 yrs in Jhs
        $subscribersNone2024femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with no source  and between 20-24 yrs in Shs
        $subscribersNone2024femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with no source  and between 20-24 yrs in Tertiary
        $subscribersNone2024femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with no source  and between 20-24 yrs not in school
        $subscribersNone2024femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql2024 . " " . $sqlfemale . " " . $sqlna)
                ->count();

        //Subscribers registered with no source  and between 25+ yrs 
        $subscribersNone25 = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25)
                ->count();

        //Male Subscribers registered with no source  and between 25+ yrs
        $subscribersNone25male = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlmale)
                ->count();

        //Male Subscribers registered with no source  and between 25+ yrs in Jhs
        $subscribersNone25malejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlmale . " " . $sqljhs)
                ->count();

        //Male Subscribers registered with no source  and between 25+ yrs in Shs
        $subscribersNone25maleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlmale . " " . $sqlshs)
                ->count();

        //Male Subscribers registered with no source  and between 25+ yrs in Tertiary
        $subscribersNone25maleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlmale . " " . $sqlter)
                ->count();

        //Male Subscribers registered with no source  and between 25+ yrs not in school
        $subscribersNone25malena = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlmale . " " . $sqlna)
                ->count();

        //Female Subscribers registered with no source  and between 25+ yrs
        $subscribersNone25female = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlfemale)
                ->count();

        //Female Subscribers registered with no source  and between 25+ yrs in Jhs
        $subscribersNone25femalejhs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlfemale . " " . $sqljhs)
                ->count();

        //Female Subscribers registered with no source  and between 25+ yrs in Shs
        $subscribersNone25femaleshs = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlfemale . " " . $sqlshs)
                ->count();

        //Female Subscribers registered with no source  and between 25+ yrs in Tertiary
        $subscribersNone25femaleter = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlfemale . " " . $sqlter)
                ->count();

        //Female Subscribers registered with no source  and between 25+ yrs not in school
        $subscribersNone25femalena = DB::table('clients_sms_registration')
                ->whereRaw($sqlNone . " " . $sql25 . " " . $sqlfemale . " " . $sqlna)
                ->count();

       


        $chartArray["chart"] = array("type" => "column");
        $chartArray["title"] = array("text" => "NoYawa Registrants By Source");
        $chartArray["subtitle"] = array("text" => "Click the slices to view more breakdowns");
        $chartArray["xAxis"] = array("type" => "category");
        $chartArray["legend"] = array("enabled" => true,"layout"=>"vertical","align"=>"right","verticalAlign"=>"top");
        $chartArray["credits"] = array("enabled" => false);
        //$chartArray["tooltip"] = array("pointFormat" => "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>","headerFormat"=>"<span style='font-size:11px'>{series.name}</span><br>");
        //$chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)));
            $chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)),"pie" => array("allowPointSelect" => true, "cursor"=>"pointer","dataLabels" => array("enabled" => true,"format"=>"<b>{point.name}</b>: {point.percentage:.1f} % ({y})")));
      
        $chartArray["series"][] = array("type" => "pie", 'name' => "Sources", "colorByPoint" => true, "data" => [
                array("name" => "GF", "y" => $subscribersGF, "drilldown" => "sourceGF"), 
                array("name" => "DKT", "y" => $subscribersDKT, "drilldown" => "sourceDKT"), 
                array("name" => "MSI", "y" => $subscribersMSI, "drilldown" => "sourceMSI"),
                array("name" => "JamJar", "y" => $subscribersJamJar, "drilldown" => "sourceJamJar"), 
                array("name" => "None", "y" => $subscribersNone, "drilldown" => "sourceNone")]);
        $chartArray["drilldown"] = array("series" => [
                
            //GF drilldowns
            array("id" => "sourceGF", "name" => "GF By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersGF1519, "drilldown" => "gfage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersGF2024, "drilldown" => "gfage2024")]),
            
            array("id" => "gfage014", "name" => "GF : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersGF014male, "drilldown" => "gfmaleage014"), array("name" => "Female", "y" => $subscribersGF014female, "drilldown" => "gffemaleage014")]),
                array("name" => "GF : 0-14 yrs : Male By Education Level", "id" => "gfmaleage014", "data" => [['JHS', $subscribersGF014malejhs], ['SHS', $subscribersGF014maleshs], ['Tertiary', $subscribersGF014maleter], ["Not In School", $subscribersGF014malena]]),
                array("name" => "GF : 0-14 yrs : Female By Education Level", "id" => "gffemaleage014", "data" => [['JHS', $subscribersGF014femalejhs], ['SHS', $subscribersGF014femaleshs], ['Tertiary', $subscribersGF014femaleter], ["Not In School", $subscribersGF014femalena]]),
                
            array("id" => "gfage1519", "name" => "GF : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersGF1519male, "drilldown" => "gfmaleage1519"), array("name" => "Female", "y" => $subscribersGF1519female, "drilldown" => "gffemaleage1519")]),
                array("name" => "GF : 15-19 yrs : Male By Education Level", "id" => "gfmaleage1519", "data" => [['JHS', $subscribersGF1519malejhs], ['SHS', $subscribersGF1519maleshs], ['Tertiary', $subscribersGF1519maleter], ["Not In School", $subscribersGF1519malena]]),
                array("name" => "GF : 15-19 yrs : Female By Education Level", "id" => "gffemaleage1519", "data" => [['JHS', $subscribersGF1519femalejhs], ['SHS', $subscribersGF1519femaleshs], ['Tertiary', $subscribersGF1519femaleter], ["Not In School", $subscribersGF1519femalena]]),
                
            array("id" => "gfage2024", "name" => "GF : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersGF2024male, "drilldown" => "gfmaleage2024"), array("name" => "Female", "y" => $subscribersGF2024female, "drilldown" => "gffemaleage2024")]),
                array("name" => "GF : 20-24 yrs : Male By Education Level", "id" => "gfmaleage2024", "data" => [['JHS', $subscribersGF2024malejhs], ['SHS', $subscribersGF2024maleshs], ['Tertiary', $subscribersGF2024maleter], ["Not In School", $subscribersGF2024malena]]),
                array("name" => "GF : 20-24 yrs : Female By Education Level", "id" => "gffemaleage2024", "data" => [['JHS', $subscribersGF2024femalejhs], ['SHS', $subscribersGF2024femaleshs], ['Tertiary', $subscribersGF2024femaleter], ["Not In School", $subscribersGF2024femalena]]),
                
            array("id" => "gfage25", "name" => "GF : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersGF25male, "drilldown" => "gfmaleage25"), array("name" => "Female", "y" => $subscribersGF25female, "drilldown" => "gffemaleage25")]),
                array("name" => "GF : 25+ yrs : Male By Education Level", "id" => "gfmaleage25", "data" => [['JHS', $subscribersGF25malejhs], ['SHS', $subscribersGF25maleshs], ['Tertiary', $subscribersGF25maleter], ["Not In School", $subscribersGF25malena]]),
                array("name" => "GF : 25+ yrs : Female By Education Level", "id" => "gffemaleage25", "data" => [['JHS', $subscribersGF25femalejhs], ['SHS', $subscribersGF25femaleshs], ['Tertiary', $subscribersGF25femaleter], ["Not In School", $subscribersGF25femalena]]),
            
            
            //DKT drilldowns
            array("id" => "sourceDKT", "name" => "DKT By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersDKT1519, "drilldown" => "dktage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersDKT2024, "drilldown" => "dktage2024")]),
            
            array("id" => "dktage014", "name" => "DKT : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersDKT014male, "drilldown" => "dktmaleage014"), array("name" => "Female", "y" => $subscribersDKT014female, "drilldown" => "dktfemaleage014")]),
                array("name" => "DKT : 0-14 yrs : Male By Education Level", "id" => "dktmaleage014", "data" => [['JHS', $subscribersDKT014malejhs], ['SHS', $subscribersDKT014maleshs], ['Tertiary', $subscribersDKT014maleter], ["Not In School", $subscribersDKT014malena]]),
                array("name" => "DKT : 0-14 yrs : Female By Education Level", "id" => "dktfemaleage014", "data" => [['JHS', $subscribersDKT014femalejhs], ['SHS', $subscribersDKT014femaleshs], ['Tertiary', $subscribersDKT014femaleter], ["Not In School", $subscribersDKT014femalena]]),
                
            array("id" => "dktage1519", "name" => "DKT : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersDKT1519male, "drilldown" => "dktmaleage1519"), array("name" => "Female", "y" => $subscribersDKT1519female, "drilldown" => "dktfemaleage1519")]),
                array("name" => "DKT : 15-19 yrs : Male By Education Level", "id" => "dktmaleage1519", "data" => [['JHS', $subscribersDKT1519malejhs], ['SHS', $subscribersDKT1519maleshs], ['Tertiary', $subscribersDKT1519maleter], ["Not In School", $subscribersDKT1519malena]]),
                array("name" => "DKT : 15-19 yrs : Female By Education Level", "id" => "dktfemaleage1519", "data" => [['JHS', $subscribersDKT1519femalejhs], ['SHS', $subscribersDKT1519femaleshs], ['Tertiary', $subscribersDKT1519femaleter], ["Not In School", $subscribersDKT1519femalena]]),
                
            array("id" => "dktage2024", "name" => "DKT : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersDKT2024male, "drilldown" => "dktmaleage2024"), array("name" => "Female", "y" => $subscribersDKT2024female, "drilldown" => "dktfemaleage2024")]),
                array("name" => "DKT : 20-24 yrs : Male By Education Level", "id" => "dktmaleage2024", "data" => [['JHS', $subscribersDKT2024malejhs], ['SHS', $subscribersDKT2024maleshs], ['Tertiary', $subscribersDKT2024maleter], ["Not In School", $subscribersDKT2024malena]]),
                array("name" => "DKT : 20-24 yrs : Female By Education Level", "id" => "dktfemaleage2024", "data" => [['JHS', $subscribersDKT2024femalejhs], ['SHS', $subscribersDKT2024femaleshs], ['Tertiary', $subscribersDKT2024femaleter], ["Not In School", $subscribersDKT2024femalena]]),
                
            array("id" => "dktage25", "name" => "DKT : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersDKT25male, "drilldown" => "dktmaleage25"), array("name" => "Female", "y" => $subscribersDKT25female, "drilldown" => "dktfemaleage25")]),
                array("name" => "DKT : 25+ yrs : Male By Education Level", "id" => "dktmaleage25", "data" => [['JHS', $subscribersDKT25malejhs], ['SHS', $subscribersDKT25maleshs], ['Tertiary', $subscribersDKT25maleter], ["Not In School", $subscribersDKT25malena]]),
                array("name" => "DKT : 25+ yrs : Female By Education Level", "id" => "dktfemaleage25", "data" => [['JHS', $subscribersDKT25femalejhs], ['SHS', $subscribersDKT25femaleshs], ['Tertiary', $subscribersDKT25femaleter], ["Not In School", $subscribersDKT25femalena]]),
            

            //MSI drilldowns
            
            array("id" => "sourceMSI", "name" => "MSI By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersMSI1519, "drilldown" => "msiage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersMSI2024, "drilldown" => "msiage2024")]),
            
            array("id" => "msiage014", "name" => "MSI : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersMSI014male, "drilldown" => "msimaleage014"), array("name" => "Female", "y" => $subscribersMSI014female, "drilldown" => "msifemaleage014")]),
                array("name" => "MSI : 0-14 yrs : Male By Education Level", "id" => "msimaleage014", "data" => [['JHS', $subscribersMSI014malejhs], ['SHS', $subscribersMSI014maleshs], ['Tertiary', $subscribersMSI014maleter], ["Not In School", $subscribersMSI014malena]]),
                array("name" => "MSI : 0-14 yrs : Female By Education Level", "id" => "msifemaleage014", "data" => [['JHS', $subscribersMSI014femalejhs], ['SHS', $subscribersMSI014femaleshs], ['Tertiary', $subscribersMSI014femaleter], ["Not In School", $subscribersMSI014femalena]]),
                
            array("id" => "msiage1519", "name" => "MSI : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersMSI1519male, "drilldown" => "msimaleage1519"), array("name" => "Female", "y" => $subscribersMSI1519female, "drilldown" => "msifemaleage1519")]),
                array("name" => "MSI : 15-19 yrs : Male By Education Level", "id" => "msimaleage1519", "data" => [['JHS', $subscribersMSI1519malejhs], ['SHS', $subscribersMSI1519maleshs], ['Tertiary', $subscribersMSI1519maleter], ["Not In School", $subscribersMSI1519malena]]),
                array("name" => "MSI : 15-19 yrs : Female By Education Level", "id" => "msifemaleage1519", "data" => [['JHS', $subscribersMSI1519femalejhs], ['SHS', $subscribersMSI1519femaleshs], ['Tertiary', $subscribersMSI1519femaleter], ["Not In School", $subscribersMSI1519femalena]]),
                
            array("id" => "msiage2024", "name" => "MSI : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersMSI2024male, "drilldown" => "msimaleage2024"), array("name" => "Female", "y" => $subscribersMSI2024female, "drilldown" => "msifemaleage2024")]),
                array("name" => "MSI : 20-24 yrs : Male By Education Level", "id" => "msimaleage2024", "data" => [['JHS', $subscribersMSI2024malejhs], ['SHS', $subscribersMSI2024maleshs], ['Tertiary', $subscribersMSI2024maleter], ["Not In School", $subscribersMSI2024malena]]),
                array("name" => "MSI : 20-24 yrs : Female By Education Level", "id" => "msifemaleage2024", "data" => [['JHS', $subscribersMSI2024femalejhs], ['SHS', $subscribersMSI2024femaleshs], ['Tertiary', $subscribersMSI2024femaleter], ["Not In School", $subscribersMSI2024femalena]]),
                
            array("id" => "msiage25", "name" => "MSI : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersMSI25male, "drilldown" => "msimaleage25"), array("name" => "Female", "y" => $subscribersMSI25female, "drilldown" => "msifemaleage25")]),
                array("name" => "MSI : 25+ yrs : Male By Education Level", "id" => "msimaleage25", "data" => [['JHS', $subscribersMSI25malejhs], ['SHS', $subscribersMSI25maleshs], ['Tertiary', $subscribersMSI25maleter], ["Not In School", $subscribersMSI25malena]]),
                array("name" => "MSI : 25+ yrs : Female By Education Level", "id" => "msifemaleage25", "data" => [['JHS', $subscribersMSI25femalejhs], ['SHS', $subscribersMSI25femaleshs], ['Tertiary', $subscribersMSI25femaleter], ["Not In School", $subscribersMSI25femalena]]),
            
         
            //JamJar drilldowns
            
            array("id" => "sourceJamJar", "name" => "JamJar By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersJamJar1519, "drilldown" => "jamjarage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersJamJar2024, "drilldown" => "jamjarage2024")]),
            
            array("id" => "jamjarage014", "name" => "JamJar : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersJamJar014male, "drilldown" => "jamjarmaleage014"), array("name" => "Female", "y" => $subscribersJamJar014female, "drilldown" => "jamjarfemaleage014")]),
                array("name" => "JamJar : 0-14 yrs : Male By Education Level", "id" => "jamjarmaleage014", "data" => [['JHS', $subscribersJamJar014malejhs], ['SHS', $subscribersJamJar014maleshs], ['Tertiary', $subscribersJamJar014maleter], ["Not In School", $subscribersJamJar014malena]]),
                array("name" => "JamJar : 0-14 yrs : Female By Education Level", "id" => "jfemaleage014", "data" => [['JHS', $subscribersJamJar014femalejhs], ['SHS', $subscribersJamJar014femaleshs], ['Tertiary', $subscribersJamJar014femaleter], ["Not In School", $subscribersJamJar014femalena]]),
                
            array("id" => "jamjarage1519", "name" => "JamJar : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersJamJar1519male, "drilldown" => "jamjarmaleage1519"), array("name" => "Female", "y" => $subscribersJamJar1519female, "drilldown" => "jamjarfemaleage1519")]),
                array("name" => "JamJar : 15-19 yrs : Male By Education Level", "id" => "jamjarmaleage1519", "data" => [['JHS', $subscribersJamJar1519malejhs], ['SHS', $subscribersJamJar1519maleshs], ['Tertiary', $subscribersJamJar1519maleter], ["Not In School", $subscribersJamJar1519malena]]),
                array("name" => "JamJar : 15-19 yrs : Female By Education Level", "id" => "jamjarfemaleage1519", "data" => [['JHS', $subscribersJamJar1519femalejhs], ['SHS', $subscribersJamJar1519femaleshs], ['Tertiary', $subscribersJamJar1519femaleter], ["Not In School", $subscribersJamJar1519femalena]]),
                
            array("id" => "jamjarage2024", "name" => "JamJar : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersJamJar2024male, "drilldown" => "jamjarmaleage2024"), array("name" => "Female", "y" => $subscribersJamJar2024female, "drilldown" => "jamjarfemaleage2024")]),
                array("name" => "JamJar : 20-24 yrs : Male By Education Level", "id" => "jamjarmaleage2024", "data" => [['JHS', $subscribersJamJar2024malejhs], ['SHS', $subscribersJamJar2024maleshs], ['Tertiary', $subscribersJamJar2024maleter], ["Not In School", $subscribersJamJar2024malena]]),
                array("name" => "JamJar : 20-24 yrs : Female By Education Level", "id" => "jamjarfemaleage2024", "data" => [['JHS', $subscribersJamJar2024femalejhs], ['SHS', $subscribersJamJar2024femaleshs], ['Tertiary', $subscribersJamJar2024femaleter], ["Not In School", $subscribersJamJar2024femalena]]),
                
            array("id" => "jamjarage25", "name" => "JamJar : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersJamJar25male, "drilldown" => "jamjarmaleage25"), array("name" => "Female", "y" => $subscribersJamJar25female, "drilldown" => "jamjarfemaleage25")]),
                array("name" => "JamJar : 25+ yrs : Male By Education Level", "id" => "jamjarmaleage25", "data" => [['JHS', $subscribersJamJar25malejhs], ['SHS', $subscribersJamJar25maleshs], ['Tertiary', $subscribersJamJar25maleter], ["Not In School", $subscribersJamJar25malena]]),
                array("name" => "JamJar : 25+ yrs : Female By Education Level", "id" => "jamjarfemaleage25", "data" => [['JHS', $subscribersJamJar25femalejhs], ['SHS', $subscribersJamJar25femaleshs], ['Tertiary', $subscribersJamJar25femaleter], ["Not In School", $subscribersJamJar25femalena]]),
            

            //None drilldowns
            
            array("id" => "sourceNone", "name" => "None By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersNone1519, "drilldown" => "noneage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersNone2024, "drilldown" => "noneage2024")]),
            
            array("id" => "noneage014", "name" => "None : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersNone014male, "drilldown" => "nonemaleage014"), array("name" => "Female", "y" => $subscribersNone014female, "drilldown" => "nonefemaleage014")]),
                array("name" => "None : 0-14 yrs : Male By Education Level", "id" => "nonemaleage014", "data" => [['JHS', $subscribersNone014malejhs], ['SHS', $subscribersNone014maleshs], ['Tertiary', $subscribersNone014maleter], ["Not In School", $subscribersNone014malena]]),
                array("name" => "None : 0-14 yrs : Female By Education Level", "id" => "nonefemaleage014", "data" => [['JHS', $subscribersNone014femalejhs], ['SHS', $subscribersNone014femaleshs], ['Tertiary', $subscribersNone014femaleter], ["Not In School", $subscribersNone014femalena]]),
                
            array("id" => "noneage1519", "name" => "None : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersNone1519male, "drilldown" => "nonemaleage1519"), array("name" => "Female", "y" => $subscribersNone1519female, "drilldown" => "nonefemaleage1519")]),
                array("name" => "None : 15-19 yrs : Male By Education Level", "id" => "nonemaleage1519", "data" => [['JHS', $subscribersNone1519malejhs], ['SHS', $subscribersNone1519maleshs], ['Tertiary', $subscribersNone1519maleter], ["Not In School", $subscribersNone1519malena]]),
                array("name" => "None : 15-19 yrs : Female By Education Level", "id" => "nonefemaleage1519", "data" => [['JHS', $subscribersNone1519femalejhs], ['SHS', $subscribersNone1519femaleshs], ['Tertiary', $subscribersNone1519femaleter], ["Not In School", $subscribersNone1519femalena]]),
                
            array("id" => "noneage2024", "name" => "None : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersNone2024male, "drilldown" => "nonemaleage2024"), array("name" => "Female", "y" => $subscribersNone2024female, "drilldown" => "nonefemaleage2024")]),
                array("name" => "None : 20-24 yrs : Male By Education Level", "id" => "nonemaleage2024", "data" => [['JHS', $subscribersNone2024malejhs], ['SHS', $subscribersNone2024maleshs], ['Tertiary', $subscribersNone2024maleter], ["Not In School", $subscribersNone2024malena]]),
                array("name" => "None : 20-24 yrs : Female By Education Level", "id" => "nonefemaleage2024", "data" => [['JHS', $subscribersNone2024femalejhs], ['SHS', $subscribersNone2024femaleshs], ['Tertiary', $subscribersNone2024femaleter], ["Not In School", $subscribersNone2024femalena]]),
                
            array("id" => "noneage25", "name" => "None : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersNone25male, "drilldown" => "nonemaleage25"), array("name" => "Female", "y" => $subscribersNone25female, "drilldown" => "nonefemaleage25")]),
                array("name" => "None : 25+ yrs : Male By Education Level", "id" => "nonemaleage25", "data" => [['JHS', $subscribersNone25malejhs], ['SHS', $subscribersNone25maleshs], ['Tertiary', $subscribersNone25maleter], ["Not In School", $subscribersNone25malena]]),
                array("name" => "None : 25+ yrs : Female By Education Level", "id" => "nonefemaleage25", "data" => [['JHS', $subscribersNone25femalejhs], ['SHS', $subscribersNone25femaleshs], ['Tertiary', $subscribersNone25femaleter], ["Not In School", $subscribersNone25femalena]])
            

            
            ]);

        return $chartArray;
    }

}
