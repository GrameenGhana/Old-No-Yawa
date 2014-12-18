  array("id" => "sourceNone", "name" => "None By Age Groups", "data" => [array("name" => "0-14 yrs", "y" => $subscribersNone014, "drilldown" => "noneage014"), 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersNone1519, "drilldown" => "noneage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersNone2024, "drilldown" => "noneage2024"), 
                                                                    array("name" => "25+ yrs", "y" => $subscribersNone25, "drilldown" => "noneage25")]),
            
            array("id" => "noneage014", "name" => "0-14 yrs", "data" => [array("name" => "Male", "y" => $subscribersNone014male, "drilldown" => "nonemaleage014"), array("name" => "Female", "y" => $subscribersNone014female, "drilldown" => "nonefemaleage014")]),
                array("name" => "Education Level", "id" => "nonemaleage014", "data" => [['JHS', $subscribersNone014malejhs], ['SHS', $subscribersNone014maleshs], ['Tertiary', $subscribersNone014maleter], ["Not In School", $subscribersNone014malena]]),
                array("name" => "Education Level", "id" => "nonefemaleage014", "data" => [['JHS', $subscribersNone014femalejhs], ['SHS', $subscribersNone014femaleshs], ['Tertiary', $subscribersNone014femaleter], ["Not In School", $subscribersNone014femalena]]),
                
            array("id" => "noneage1519", "name" => "15-19 yrs", "data" => [array("name" => "Male", "y" => $subscribersNone1519male, "drilldown" => "nonemaleage1519"), array("name" => "Female", "y" => $subscribersNone1519female, "drilldown" => "nonefemaleage1519")]),
                array("name" => "Education Level", "id" => "nonemaleage1519", "data" => [['JHS', $subscribersNone1519malejhs], ['SHS', $subscribersNone1519maleshs], ['Tertiary', $subscribersNone1519maleter], ["Not In School", $subscribersNone1519malena]]),
                array("name" => "Education Level", "id" => "nonefemaleage1519", "data" => [['JHS', $subscribersNone1519femalejhs], ['SHS', $subscribersNone1519femaleshs], ['Tertiary', $subscribersNone1519femaleter], ["Not In School", $subscribersNone1519femalena]]),
                
            array("id" => "noneage2024", "name" => "20-24 yrs", "data" => [array("name" => "Male", "y" => $subscribersNone2024male, "drilldown" => "nonemaleage2024"), array("name" => "Female", "y" => $subscribersNone2024female, "drilldown" => "nonefemaleage2024")]),
                array("name" => "Education Level", "id" => "nonemaleage2024", "data" => [['JHS', $subscribersNone2024malejhs], ['SHS', $subscribersNone2024maleshs], ['Tertiary', $subscribersNone2024maleter], ["Not In School", $subscribersNone2024malena]]),
                array("name" => "Education Level", "id" => "nonefemaleage2024", "data" => [['JHS', $subscribersNone2024femalejhs], ['SHS', $subscribersNone2024femaleshs], ['Tertiary', $subscribersNone2024femaleter], ["Not In School", $subscribersNone2024femalena]]),
                
            array("id" => "noneage25", "name" => "25+ yrs", "data" => [array("name" => "Male", "y" => $subscribersNone25male, "drilldown" => "nonemaleage25"), array("name" => "Female", "y" => $subscribersNone25female, "drilldown" => "nonefemaleage25")]),
                array("name" => "Education Level", "id" => "nonemaleage25", "data" => [['JHS', $subscribersNone25malejhs], ['SHS', $subscribersNone25maleshs], ['Tertiary', $subscribersNone25maleter], ["Not In School", $subscribersNone25malena]]),
                array("name" => "Education Level", "id" => "nonefemaleage25", "data" => [['JHS', $subscribersNone25femalejhs], ['SHS', $subscribersNone25femaleshs], ['Tertiary', $subscribersNone25femaleter], ["Not In School", $subscribersNone25femalena]])
            
