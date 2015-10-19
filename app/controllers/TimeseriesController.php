<?php

class TimeseriesController extends BaseController {

    public function showTimeseriesChart() {
        
        return View::make('stats/timeseriescharts');
    }
    
    public function getOutgoingCallsData(){
        
        $year = Input::get( 'y' );
        
        //if no year is selected , load charts for current year
        if($year == null){
            $year = date("Y");
        }
        
        $jansubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA")  And Month(calldate) = 01  And Year(calldate) = '.$year)
                ->count();
        
        $febsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 02  And Year(calldate) = '.$year)
                ->count();
        
        $marsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 03  And Year(calldate) = '.$year)
                ->count();
        
        $aprsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 04  And Year(calldate) = '.$year)
                ->count();
        
        $maysubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 05  And Year(calldate) = '.$year)
                ->count();
        
        $junsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 06  And Year(calldate) = '.$year)
                ->count();
        
        $julsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 07  And Year(calldate) = '.$year)
                ->count();
        
        $augsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 08  And Year(calldate) = '.$year)
                ->count();
        
        $sepsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 09  And Year(calldate) = '.$year)
                ->count();
        
        $octsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 10  And Year(calldate) = '.$year)
                ->count();
        
        
        $novsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 11  And Year(calldate) = '.$year)
                ->count();
        
        $decsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src IN ("NOYAWA") And Month(calldate) = 12  And Year(calldate) = '.$year)
                ->count();
        
        
        $data = [$jansubscribers, $febsubscribers, $marsubscribers, $aprsubscribers, $maysubscribers, $junsubscribers, $julsubscribers, $augsubscribers, $sepsubscribers, $octsubscribers, $novsubscribers,$decsubscribers];
        return  $data;
    }
    
    public function getIncomingCallsData(){
        
        $year = Input::get( 'y' );
        
        //if no year is selected , load charts for current year
        if($year == null){
            $year = date("Y");
        }
        
        $jansubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 01  And Year(calldate) = '.$year)
                ->count();
        
        $febsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$" And Month(calldate) = 02  And Year(calldate) = '.$year)
                ->count();
        
        $marsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 03  And Year(calldate) = '.$year)
                ->count();
        
        $aprsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 04  And Year(calldate) = '.$year)
                ->count();
        
        $maysubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 05  And Year(calldate) = '.$year)
                ->count();
        
        $junsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 06  And Year(calldate) = '.$year)
                ->count();
        
        $julsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 07  And Year(calldate) = '.$year)
                ->count();
        
        $augsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 08  And Year(calldate) = '.$year)
                ->count();
        
        $sepsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 09  And Year(calldate) = '.$year)
                ->count();
        
        $octsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 10  And Year(calldate) = '.$year)
                ->count();
        
        
        $novsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 11  And Year(calldate) = '.$year)
                ->count();
        
        $decsubscribers = DB::table('asterisk.cdr as a')
                ->whereRaw('a.src REGEXP "^-?[0-9]+$"  And Month(calldate) = 12  And Year(calldate) = '.$year)
                ->count();
        
        
        $data = [$jansubscribers, $febsubscribers, $marsubscribers, $aprsubscribers, $maysubscribers, $junsubscribers, $julsubscribers, $augsubscribers, $sepsubscribers, $octsubscribers, $novsubscribers,$decsubscribers];
        return  $data;
    }
    
    public function getOutgoingSmsData(){
        
        $year = Input::get( 'y' );
        
        //if no year is selected , load charts for current year
        if($year == null){
            $year = date("Y");
        }
        
        $jansubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND"  And Month(created_at) = 01  And Year(created_at) = '.$year)
                ->count();
        
        $febsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 02  And Year(created_at) = '.$year)
                ->count();
        
        $marsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 03  And Year(created_at) = '.$year)
                ->count();
        
        $aprsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 04  And Year(created_at) = '.$year)
                ->count();
        
        $maysubscribers =DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 05  And Year(created_at) = '.$year)
                ->count();
        
        $junsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 06  And Year(created_at) = '.$year)
                ->count();
        
        $julsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 07  And Year(created_at) = '.$year)
                ->count();
        
        $augsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 08  And Year(created_at) = '.$year)
                ->count();
        
        $sepsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 09  And Year(created_at) = '.$year)
                ->count();
        
        $octsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 10  And Year(created_at) = '.$year)
                ->count();
        
        
        $novsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 11  And Year(created_at) = '.$year)
                ->count();
        
        $decsubscribers = DB::table('smslog')
                ->whereRaw('direction ="OUTBOUND" And Month(created_at) = 12  And Year(created_at) = '.$year)
                ->count();
        
        
        $data = [$jansubscribers, $febsubscribers, $marsubscribers, $aprsubscribers, $maysubscribers, $junsubscribers, $julsubscribers, $augsubscribers, $sepsubscribers, $octsubscribers, $novsubscribers,$decsubscribers];
        return  $data;
    }
    
    public function getIncomingSmsData(){
        
        $year = Input::get( 'y' );
        
        //if no year is selected , load charts for current year
        if($year == null){
            $year = date("Y");
        }
        
        $jansubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND"  And Month(created_at) = 01  And Year(created_at) = '.$year)
                ->count();
        
        $febsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 02  And Year(created_at) = '.$year)
                ->count();
        
        $marsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 03  And Year(created_at) = '.$year)
                ->count();
        
        $aprsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 04  And Year(created_at) = '.$year)
                ->count();
        
        $maysubscribers =DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 05  And Year(created_at) = '.$year)
                ->count();
        
        $junsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 06  And Year(created_at) = '.$year)
                ->count();
        
        $julsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 07  And Year(created_at) = '.$year)
                ->count();
        
        $augsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 08  And Year(created_at) = '.$year)
                ->count();
        
        $sepsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 09  And Year(created_at) = '.$year)
                ->count();
        
        $octsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 10  And Year(created_at) = '.$year)
                ->count();
        
        
        $novsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 11  And Year(created_at) = '.$year)
                ->count();
        
        $decsubscribers = DB::table('smslog')
                ->whereRaw('direction ="INBOUND" And Month(created_at) = 12  And Year(created_at) = '.$year)
                ->count();
        
        
        $data = [$jansubscribers, $febsubscribers, $marsubscribers, $aprsubscribers, $maysubscribers, $junsubscribers, $julsubscribers, $augsubscribers, $sepsubscribers, $octsubscribers, $novsubscribers,$decsubscribers];
        return  $data;
    }
    
    
}
