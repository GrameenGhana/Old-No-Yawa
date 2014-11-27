$chartArray["chart"] = array("type" => "column");
        $chartArray["title"] = array("text" => "NoYawa Registrants By Network Operators");
        $chartArray["subtitle"] = array("text" => "Click the slices to view more breakdowns");
        $chartArray["xAxis"] = array("type" => "category");
        $chartArray["legend"] = array("enabled" => true,"layout"=>"vertical","align"=>"right","verticalAlign"=>"top");
        $chartArray["credits"] = array("enabled" => false);
        //$chartArray["tooltip"] = array("pointFormat" => "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>","headerFormat"=>"<span style='font-size:11px'>{series.name}</span><br>");
        $chartArray["plotOptions"] = array("series" => array("borderWidth" => 0, "dataLabels" => array("enabled" => true)));
        $chartArray["series"][] = array("type" => "pie", 'name' => "Channels", "colorByPoint" => true, "data" => [
                array("name" => "Mtn", "y" => $subscribersMtn), "drilldown" => "networkMtn"), 
                array("name" => "Tigo", "y" => $subscribersTigo), "drilldown" => "networkTigo"), 
                array("name" => "Airtel", "y" => $subscribersAirtel), "drilldown" => "networkAirtel"),
                array("name" => "Vodafone", "y" => $subscribersVodafone), "drilldown" => "networkVodafone"), 
                array("name" => "Glo", "y" => $subscribersGlo), "drilldown" => "networkGlo"), 
                array("name" => "Expresso", "y" => $subscribersExpresso), "drilldown" => "networkExpresso")]);
        $chartArray["drilldown"] = array("series" => [
                
            //Mtn drilldowns
            array("id" => "networkMtn", "name" => "Mtn : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersMtn014), "drilldown" => "mtnage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersMtn1519), "drilldown" => "mtnage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersMtn2024), "drilldown" => "mtnage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersMtn25), "drilldown" => "mtnage25")]),
            
            array("id" => "mtnage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersMtn014male), "drilldown" => "mtnmaleage014"), array("name" => "Female", "y" => $subscribersMtn014female), "drilldown" => "mtnfemaleage014")]),
                array("name" => "Education Level", "id" => "mtnmaleage014", "data" => [['JHS', $subscribersMtn014malejhs)], ['SHS', $subscribersMtn014maleshs)], ['Tertiary', $subscribersMtn014maleter)], ["Not In School", $subscribersMtn014malena)]]),
                array("name" => "Education Level", "id" => "mtnfemaleage014", "data" => [['JHS', $subscribersMtn014femalejhs)], ['SHS', $subscribersMtn014femaleshs)], ['Tertiary', $subscribersMtn014femaleter)], ["Not In School", $subscribersMtn014femalena)]]),
                
            array("id" => "mtnage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersMtn1519male), "drilldown" => "mtnmaleage1519"), array("name" => "Female", "y" => $subscribersMtn1519female), "drilldown" => "mtnfemaleage1519")]),
                array("name" => "Education Level", "id" => "mtnmaleage1519", "data" => [['JHS', $subscribersMtn1519malejhs)], ['SHS', $subscribersMtn1519maleshs)], ['Tertiary', $subscribersMtn1519maleter)], ["Not In School", $subscribersMtn1519malena)]]),
                array("name" => "Education Level", "id" => "mtnfemaleage1519", "data" => [['JHS', $subscribersMtn1519femalejhs)], ['SHS', $subscribersMtn1519femaleshs)], ['Tertiary', $subscribersMtn1519femaleter)], ["Not In School", $subscribersMtn1519femalena)]]),
                
            array("id" => "mtnage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersMtn2024male), "drilldown" => "mtnmaleage2024"), array("name" => "Female", "y" => $subscribersMtn2024female), "drilldown" => "mtnfemaleage2024")]),
                array("name" => "Education Level", "id" => "mtnmaleage2024", "data" => [['JHS', $subscribersMtn2024malejhs)], ['SHS', $subscribersMtn2024maleshs)], ['Tertiary', $subscribersMtn2024maleter)], ["Not In School", $subscribersMtn2024malena)]]),
                array("name" => "Education Level", "id" => "mtnfemaleage2024", "data" => [['JHS', $subscribersMtn2024femalejhs)], ['SHS', $subscribersMtn2024femaleshs)], ['Tertiary', $subscribersMtn2024femaleter)], ["Not In School", $subscribersMtn2024femalena)]]),
                
            array("id" => "mtnage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersMtn25male), "drilldown" => "mtnmaleage25"), array("name" => "Female", "y" => $subscribersMtn25female), "drilldown" => "mtnfemaleage25")]),
                array("name" => "Education Level", "id" => "mtnmaleage25", "data" => [['JHS', $subscribersMtn25malejhs)], ['SHS', $subscribersMtn25maleshs)], ['Tertiary', $subscribersMtn25maleter)], ["Not In School", $subscribersMtn25malena)]]),
                array("name" => "Education Level", "id" => "mtnfemaleage25", "data" => [['JHS', $subscribersMtn25femalejhs)], ['SHS', $subscribersMtn25femaleshs)], ['Tertiary', $subscribersMtn25femaleter)], ["Not In School", $subscribersMtn25femalena)]]),
            
            
            //Tigo drilldowns
            array("id" => "networkTigo", "name" => "Tigo : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersTigo014), "drilldown" => "tigoage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersTigo1519), "drilldown" => "tigoage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersTigo2024), "drilldown" => "tigoage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersTigo25), "drilldown" => "tigoage25")]),
            
            array("id" => "tigoage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersTigo014male), "drilldown" => "tigomaleage014"), array("name" => "Female", "y" => $subscribersTigo014female), "drilldown" => "tigofemaleage014")]),
                array("name" => "Education Level", "id" => "tigomaleage014", "data" => [['JHS', $subscribersTigo014malejhs)], ['SHS', $subscribersTigo014maleshs)], ['Tertiary', $subscribersTigo014maleter)], ["Not In School", $subscribersTigo014malena)]]),
                array("name" => "Education Level", "id" => "tigofemaleage014", "data" => [['JHS', $subscribersTigo014femalejhs)], ['SHS', $subscribersTigo014femaleshs)], ['Tertiary', $subscribersTigo014femaleter)], ["Not In School", $subscribersTigo014femalena)]]),
                
            array("id" => "tigoage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersTigo1519male), "drilldown" => "tigomaleage1519"), array("name" => "Female", "y" => $subscribersTigo1519female), "drilldown" => "tigofemaleage1519")]),
                array("name" => "Education Level", "id" => "tigomaleage1519", "data" => [['JHS', $subscribersTigo1519malejhs)], ['SHS', $subscribersTigo1519maleshs)], ['Tertiary', $subscribersTigo1519maleter)], ["Not In School", $subscribersTigo1519malena)]]),
                array("name" => "Education Level", "id" => "tigofemaleage1519", "data" => [['JHS', $subscribersTigo1519femalejhs)], ['SHS', $subscribersTigo1519femaleshs)], ['Tertiary', $subscribersTigo1519femaleter)], ["Not In School", $subscribersTigo1519femalena)]]),
                
            array("id" => "tigoage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersTigo2024male), "drilldown" => "tigomaleage2024"), array("name" => "Female", "y" => $subscribersTigo2024female), "drilldown" => "tigofemaleage2024")]),
                array("name" => "Education Level", "id" => "tigomaleage2024", "data" => [['JHS', $subscribersTigo2024malejhs)], ['SHS', $subscribersTigo2024maleshs)], ['Tertiary', $subscribersTigo2024maleter)], ["Not In School", $subscribersTigo2024malena)]]),
                array("name" => "Education Level", "id" => "tigofemaleage2024", "data" => [['JHS', $subscribersTigo2024femalejhs)], ['SHS', $subscribersTigo2024femaleshs)], ['Tertiary', $subscribersTigo2024femaleter)], ["Not In School", $subscribersTigo2024femalena)]]),
                
            array("id" => "tigoage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersTigo25male), "drilldown" => "tigomaleage25"), array("name" => "Female", "y" => $subscribersTigo25female), "drilldown" => "tigofemaleage25")]),
                array("name" => "Education Level", "id" => "tigomaleage25", "data" => [['JHS', $subscribersTigo25malejhs)], ['SHS', $subscribersTigo25maleshs)], ['Tertiary', $subscribersTigo25maleter)], ["Not In School", $subscribersTigo25malena)]]),
                array("name" => "Education Level", "id" => "tigofemaleage25", "data" => [['JHS', $subscribersTigo25femalejhs)], ['SHS', $subscribersTigo25femaleshs)], ['Tertiary', $subscribersTigo25femaleter)], ["Not In School", $subscribersTigo25femalena)]]),
            

            //Airtel drilldowns
            
            array("id" => "networkAirtel", "name" => "Airtel : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersAirtel014), "drilldown" => "airtelage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersAirtel1519), "drilldown" => "airtelage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersAirtel2024), "drilldown" => "airtelage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersAirtel25), "drilldown" => "airtelage25")]),
            
            array("id" => "airtelage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersAirtel014male), "drilldown" => "airtelmaleage014"), array("name" => "Female", "y" => $subscribersAirtel014female), "drilldown" => "airtelfemaleage014")]),
                array("name" => "Education Level", "id" => "airtelmaleage014", "data" => [['JHS', $subscribersAirtel014malejhs)], ['SHS', $subscribersAirtel014maleshs)], ['Tertiary', $subscribersAirtel014maleter)], ["Not In School", $subscribersAirtel014malena)]]),
                array("name" => "Education Level", "id" => "airtelfemaleage014", "data" => [['JHS', $subscribersAirtel014femalejhs)], ['SHS', $subscribersAirtel014femaleshs)], ['Tertiary', $subscribersAirtel014femaleter)], ["Not In School", $subscribersAirtel014femalena)]]),
                
            array("id" => "airtelage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersAirtel1519male), "drilldown" => "airtelmaleage1519"), array("name" => "Female", "y" => $subscribersAirtel1519female), "drilldown" => "airtelfemaleage1519")]),
                array("name" => "Education Level", "id" => "airtelmaleage1519", "data" => [['JHS', $subscribersAirtel1519malejhs)], ['SHS', $subscribersAirtel1519maleshs)], ['Tertiary', $subscribersAirtel1519maleter)], ["Not In School", $subscribersAirtel1519malena)]]),
                array("name" => "Education Level", "id" => "airtelfemaleage1519", "data" => [['JHS', $subscribersAirtel1519femalejhs)], ['SHS', $subscribersAirtel1519femaleshs)], ['Tertiary', $subscribersAirtel1519femaleter)], ["Not In School", $subscribersAirtel1519femalena)]]),
                
            array("id" => "airtelage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersAirtel2024male), "drilldown" => "airtelmaleage2024"), array("name" => "Female", "y" => $subscribersAirtel2024female), "drilldown" => "airtelfemaleage2024")]),
                array("name" => "Education Level", "id" => "airtelmaleage2024", "data" => [['JHS', $subscribersAirtel2024malejhs)], ['SHS', $subscribersAirtel2024maleshs)], ['Tertiary', $subscribersAirtel2024maleter)], ["Not In School", $subscribersAirtel2024malena)]]),
                array("name" => "Education Level", "id" => "airtelfemaleage2024", "data" => [['JHS', $subscribersAirtel2024femalejhs)], ['SHS', $subscribersAirtel2024femaleshs)], ['Tertiary', $subscribersAirtel2024femaleter)], ["Not In School", $subscribersAirtel2024femalena)]]),
                
            array("id" => "airtelage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersAirtel25male), "drilldown" => "airtelmaleage25"), array("name" => "Female", "y" => $subscribersAirtel25female), "drilldown" => "airtelfemaleage25")]),
                array("name" => "Education Level", "id" => "airtelmaleage25", "data" => [['JHS', $subscribersAirtel25malejhs)], ['SHS', $subscribersAirtel25maleshs)], ['Tertiary', $subscribersAirtel25maleter)], ["Not In School", $subscribersAirtel25malena)]]),
                array("name" => "Education Level", "id" => "airtelfemaleage25", "data" => [['JHS', $subscribersAirtel25femalejhs)], ['SHS', $subscribersAirtel25femaleshs)], ['Tertiary', $subscribersAirtel25femaleter)], ["Not In School", $subscribersAirtel25femalena)]]),
            
         
            //Vodafone drilldowns
            
            array("id" => "networkVodafone", "name" => "Vodafone : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersVodafone014), "drilldown" => "vodafoneage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersVodafone1519), "drilldown" => "vodafoneage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersVodafone2024), "drilldown" => "vodafoneage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersVodafone25), "drilldown" => "vodafoneage25")]),
            
            array("id" => "vodafoneage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersVodafone014male), "drilldown" => "vodafonemaleage014"), array("name" => "Female", "y" => $subscribersVodafone014female), "drilldown" => "vodafonefemaleage014")]),
                array("name" => "Education Level", "id" => "vodafonemaleage014", "data" => [['JHS', $subscribersVodafone014malejhs)], ['SHS', $subscribersVodafone014maleshs)], ['Tertiary', $subscribersVodafone014maleter)], ["Not In School", $subscribersVodafone014malena)]]),
                array("name" => "Education Level", "id" => "vodafonefemaleage014", "data" => [['JHS', $subscribersVodafone014femalejhs)], ['SHS', $subscribersVodafone014femaleshs)], ['Tertiary', $subscribersVodafone014femaleter)], ["Not In School", $subscribersVodafone014femalena)]]),
                
            array("id" => "vodafoneage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersVodafone1519male), "drilldown" => "vodafonemaleage1519"), array("name" => "Female", "y" => $subscribersVodafone1519female), "drilldown" => "vodafonefemaleage1519")]),
                array("name" => "Education Level", "id" => "vodafonemaleage1519", "data" => [['JHS', $subscribersVodafone1519malejhs)], ['SHS', $subscribersVodafone1519maleshs)], ['Tertiary', $subscribersVodafone1519maleter)], ["Not In School", $subscribersVodafone1519malena)]]),
                array("name" => "Education Level", "id" => "vodafonefemaleage1519", "data" => [['JHS', $subscribersVodafone1519femalejhs)], ['SHS', $subscribersVodafone1519femaleshs)], ['Tertiary', $subscribersVodafone1519femaleter)], ["Not In School", $subscribersVodafone1519femalena)]]),
                
            array("id" => "vodafoneage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersVodafone2024male), "drilldown" => "vodafonemaleage2024"), array("name" => "Female", "y" => $subscribersVodafone2024female), "drilldown" => "vodafonefemaleage2024")]),
                array("name" => "Education Level", "id" => "vodafonemaleage2024", "data" => [['JHS', $subscribersVodafone2024malejhs)], ['SHS', $subscribersVodafone2024maleshs)], ['Tertiary', $subscribersVodafone2024maleter)], ["Not In School", $subscribersVodafone2024malena)]]),
                array("name" => "Education Level", "id" => "vodafonefemaleage2024", "data" => [['JHS', $subscribersVodafone2024femalejhs)], ['SHS', $subscribersVodafone2024femaleshs)], ['Tertiary', $subscribersVodafone2024femaleter)], ["Not In School", $subscribersVodafone2024femalena)]]),
                
            array("id" => "vodafoneage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersVodafone25male), "drilldown" => "vodafonemaleage25"), array("name" => "Female", "y" => $subscribersVodafone25female), "drilldown" => "vodafonefemaleage25")]),
                array("name" => "Education Level", "id" => "vodafonemaleage25", "data" => [['JHS', $subscribersVodafone25malejhs)], ['SHS', $subscribersVodafone25maleshs)], ['Tertiary', $subscribersVodafone25maleter)], ["Not In School", $subscribersVodafone25malena)]]),
                array("name" => "Education Level", "id" => "vodafonefemaleage25", "data" => [['JHS', $subscribersVodafone25femalejhs)], ['SHS', $subscribersVodafone25femaleshs)], ['Tertiary', $subscribersVodafone25femaleter)], ["Not In School", $subscribersVodafone25femalena)]]),
            

            //Glo drilldowns
            
            array("id" => "networkGlo", "name" => "Glo : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersGlo014), "drilldown" => "gloage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersGlo1519), "drilldown" => "gloage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersGlo2024), "drilldown" => "gloage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersGlo25), "drilldown" => "gloage25")]),
            
            array("id" => "gloage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersGlo014male), "drilldown" => "glomaleage014"), array("name" => "Female", "y" => $subscribersGlo014female), "drilldown" => "glofemaleage014")]),
                array("name" => "Education Level", "id" => "glomaleage014", "data" => [['JHS', $subscribersGlo014malejhs)], ['SHS', $subscribersGlo014maleshs)], ['Tertiary', $subscribersGlo014maleter)], ["Not In School", $subscribersGlo014malena)]]),
                array("name" => "Education Level", "id" => "glofemaleage014", "data" => [['JHS', $subscribersGlo014femalejhs)], ['SHS', $subscribersGlo014femaleshs)], ['Tertiary', $subscribersGlo014femaleter)], ["Not In School", $subscribersGlo014femalena)]]),
                
            array("id" => "gloage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersGlo1519male), "drilldown" => "glomaleage1519"), array("name" => "Female", "y" => $subscribersGlo1519female), "drilldown" => "glofemaleage1519")]),
                array("name" => "Education Level", "id" => "glomaleage1519", "data" => [['JHS', $subscribersGlo1519malejhs)], ['SHS', $subscribersGlo1519maleshs)], ['Tertiary', $subscribersGlo1519maleter)], ["Not In School", $subscribersGlo1519malena)]]),
                array("name" => "Education Level", "id" => "glofemaleage1519", "data" => [['JHS', $subscribersGlo1519femalejhs)], ['SHS', $subscribersGlo1519femaleshs)], ['Tertiary', $subscribersGlo1519femaleter)], ["Not In School", $subscribersGlo1519femalena)]]),
                
            array("id" => "gloage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersGlo2024male), "drilldown" => "glomaleage2024"), array("name" => "Female", "y" => $subscribersGlo2024female), "drilldown" => "glofemaleage2024")]),
                array("name" => "Education Level", "id" => "glomaleage2024", "data" => [['JHS', $subscribersGlo2024malejhs)], ['SHS', $subscribersGlo2024maleshs)], ['Tertiary', $subscribersGlo2024maleter)], ["Not In School", $subscribersGlo2024malena)]]),
                array("name" => "Education Level", "id" => "glofemaleage2024", "data" => [['JHS', $subscribersGlo2024femalejhs)], ['SHS', $subscribersGlo2024femaleshs)], ['Tertiary', $subscribersGlo2024femaleter)], ["Not In School", $subscribersGlo2024femalena)]]),
                
            array("id" => "gloage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersGlo25male), "drilldown" => "glomaleage25"), array("name" => "Female", "y" => $subscribersGlo25female), "drilldown" => "glofemaleage25")]),
                array("name" => "Education Level", "id" => "glomaleage25", "data" => [['JHS', $subscribersGlo25malejhs)], ['SHS', $subscribersGlo25maleshs)], ['Tertiary', $subscribersGlo25maleter)], ["Not In School", $subscribersGlo25malena)]]),
                array("name" => "Education Level", "id" => "glofemaleage25", "data" => [['JHS', $subscribersGlo25femalejhs)], ['SHS', $subscribersGlo25femaleshs)], ['Tertiary', $subscribersGlo25femaleter)], ["Not In School", $subscribersGlo25femalena)]]),
            

            //Expresso drilldowns
            
            array("id" => "networkExpresso", "name" => "Expresso : Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersExpresso014), "drilldown" => "expressoage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersExpresso1519), "drilldown" => "expressoage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersExpresso2024), "drilldown" => "expressoage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersExpresso25), "drilldown" => "expressoage25")]),
            
            array("id" => "expressoage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersExpresso014male), "drilldown" => "expressomaleage014"), array("name" => "Female", "y" => $subscribersExpresso014female), "drilldown" => "expressofemaleage014")]),
                array("name" => "Education Level", "id" => "expressomaleage014", "data" => [['JHS', $subscribersExpresso014malejhs)], ['SHS', $subscribersExpresso014maleshs)], ['Tertiary', $subscribersExpresso014maleter)], ["Not In School", $subscribersExpresso014malena)]]),
                array("name" => "Education Level", "id" => "expressofemaleage014", "data" => [['JHS', $subscribersExpresso014femalejhs)], ['SHS', $subscribersExpresso014femaleshs)], ['Tertiary', $subscribersExpresso014femaleter)], ["Not In School", $subscribersExpresso014femalena)]]),
                
            array("id" => "expressoage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersExpresso1519male), "drilldown" => "expressomaleage1519"), array("name" => "Female", "y" => $subscribersExpresso1519female), "drilldown" => "expressofemaleage1519")]),
                array("name" => "Education Level", "id" => "expressomaleage1519", "data" => [['JHS', $subscribersExpresso1519malejhs)], ['SHS', $subscribersExpresso1519maleshs)], ['Tertiary', $subscribersExpresso1519maleter)], ["Not In School", $subscribersExpresso1519malena)]]),
                array("name" => "Education Level", "id" => "expressofemaleage1519", "data" => [['JHS', $subscribersExpresso1519femalejhs)], ['SHS', $subscribersExpresso1519femaleshs)], ['Tertiary', $subscribersExpresso1519femaleter)], ["Not In School", $subscribersExpresso1519femalena)]]),
                
            array("id" => "expressoage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersExpresso2024male), "drilldown" => "expressomaleage2024"), array("name" => "Female", "y" => $subscribersExpresso2024female), "drilldown" => "expressofemaleage2024")]),
                array("name" => "Education Level", "id" => "expressomaleage2024", "data" => [['JHS', $subscribersExpresso2024malejhs)], ['SHS', $subscribersExpresso2024maleshs)], ['Tertiary', $subscribersExpresso2024maleter)], ["Not In School", $subscribersExpresso2024malena)]]),
                array("name" => "Education Level", "id" => "expressofemaleage2024", "data" => [['JHS', $subscribersExpresso2024femalejhs)], ['SHS', $subscribersExpresso2024femaleshs)], ['Tertiary', $subscribersExpresso2024femaleter)], ["Not In School", $subscribersExpresso2024femalena)]]),
                
            array("id" => "expressoage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersExpresso25male), "drilldown" => "expressomaleage25"), array("name" => "Female", "y" => $subscribersExpresso25female), "drilldown" => "expressofemaleage25")]),
                array("name" => "Education Level", "id" => "expressomaleage25", "data" => [['JHS', $subscribersExpresso25malejhs)], ['SHS', $subscribersExpresso25maleshs)], ['Tertiary', $subscribersExpresso25maleter)], ["Not In School", $subscribersExpresso25malena)]]),
                array("name" => "Education Level", "id" => "expressofemaleage25", "data" => [['JHS', $subscribersExpresso25femalejhs)], ['SHS', $subscribersExpresso25femaleshs)], ['Tertiary', $subscribersExpresso25femaleter)], ["Not In School", $subscribersExpresso25femalena)]])
            
