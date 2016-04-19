<?php

use Bllim\Datatables\Datatables;


class MeetingsController extends BaseController {

    
    public function getData() {

             $sessions = MeetingSessions::select(array('meeting_title', 'male_attendance', 'female_attendance', 'location', 'start_time','end_time','created_by'));

       
        return Datatables::of($sessions)
                        ->make();
    }




    public function index() {

        
            $sessions = DB::table('meeting_sessions')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
       
        
        return View::make('meetingsessions.index', compact('sessions'));
    }

    
    
}
