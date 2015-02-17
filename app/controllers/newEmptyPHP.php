/Self drilldowns
            
            array("id" => "sourceSelf", "name" => "Self By Age Groups", "data" => [ 
                                                                    array("name" => "15-19 yrs", "y" => $subscribersSelf1519, "drilldown" => "selfage1519"),
                                                                    array("name" => "20-24 yrs", "y" => $subscribersSelf2024, "drilldown" => "selfage2024")]),
            
            array("id" => "selfage014", "name" => "Self : 0-14 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersSelf014male, "drilldown" => "selfmaleage014"), array("name" => "Female", "y" => $subscribersSelf014female, "drilldown" => "selffemaleage014")]),
                array("name" => "Self : 0-14 yrs : Male By Education Level", "id" => "selfmaleage014", "data" => [['JHS', $subscribersSelf014malejhs], ['SHS', $subscribersSelf014maleshs], ['Tertiary', $subscribersSelf014maleter], ["Not In School", $subscribersSelf014malena]]),
                array("name" => "Self : 0-14 yrs : Female By Education Level", "id" => "selffemaleage014", "data" => [['JHS', $subscribersSelf014femalejhs], ['SHS', $subscribersSelf014femaleshs], ['Tertiary', $subscribersSelf014femaleter], ["Not In School", $subscribersSelf014femalena]]),
                
            array("id" => "selfage1519", "name" => "Self : 15-19 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersSelf1519male, "drilldown" => "selfmaleage1519"), array("name" => "Female", "y" => $subscribersSelf1519female, "drilldown" => "selffemaleage1519")]),
                array("name" => "Self : 15-19 yrs : Male By Education Level", "id" => "selfmaleage1519", "data" => [['JHS', $subscribersSelf1519malejhs], ['SHS', $subscribersSelf1519maleshs], ['Tertiary', $subscribersSelf1519maleter], ["Not In School", $subscribersSelf1519malena]]),
                array("name" => "Self : 15-19 yrs : Female By Education Level", "id" => "selffemaleage1519", "data" => [['JHS', $subscribersSelf1519femalejhs], ['SHS', $subscribersSelf1519femaleshs], ['Tertiary', $subscribersSelf1519femaleter], ["Not In School", $subscribersSelf1519femalena]]),
                
            array("id" => "selfage2024", "name" => "Self : 20-24 yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersSelf2024male, "drilldown" => "selfmaleage2024"), array("name" => "Female", "y" => $subscribersSelf2024female, "drilldown" => "selffemaleage2024")]),
                array("name" => "Self : 20-24 yrs : Male By Education Level", "id" => "selfmaleage2024", "data" => [['JHS', $subscribersSelf2024malejhs], ['SHS', $subscribersSelf2024maleshs], ['Tertiary', $subscribersSelf2024maleter], ["Not In School", $subscribersSelf2024malena]]),
                array("name" => "Self : 20-24 yrs : Female By Education Level", "id" => "selffemaleage2024", "data" => [['JHS', $subscribersSelf2024femalejhs], ['SHS', $subscribersSelf2024femaleshs], ['Tertiary', $subscribersSelf2024femaleter], ["Not In School", $subscribersSelf2024femalena]]),
                
            array("id" => "selfage25", "name" => "Self : 25+ yrs By Gender", "data" => [array("name" => "Male", "y" => $subscribersSelf25male, "drilldown" => "selfmaleage25"), array("name" => "Female", "y" => $subscribersSelf25female, "drilldown" => "selffemaleage25")]),
                array("name" => "Self : 25+ yrs : Male By Education Level", "id" => "selfmaleage25", "data" => [['JHS', $subscribersSelf25malejhs], ['SHS', $subscribersSelf25maleshs], ['Tertiary', $subscribersSelf25maleter], ["Not In School", $subscribersSelf25malena]]),
                array("name" => "Self : 25+ yrs : Female By Education Level", "id" => "selffemaleage25", "data" => [['JHS', $subscribersSelf25femalejhs], ['SHS', $subscribersSelf25femaleshs], ['Tertiary', $subscribersSelf25femaleter], ["Not In School", $subscribersSelf25femalena]])
            
