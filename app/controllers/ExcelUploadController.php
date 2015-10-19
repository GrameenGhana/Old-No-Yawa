<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcelUploadController
 *
 * @author liman
 */


use Bllim\Datatables\Datatables;
class ExcelUploadController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');

        $this->roles = array('Admin' => 'Admin', 'Guest' => 'Guest', 'Manager' => 'Manager', 'API' => 'API User');

        $this->rules = array('username' => 'required|min:3|unique:users',
            'password' => 'required|min:6',
            'confirmpassword' => 'required|same:password',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'role' => 'required|min:2'
        );
    }
    
    public function getData() {

        $uploads = ExcelUpload::select(array('file_name', 'number_of_records', 'status',  'created_at','uploaded_by'));

        return Datatables::of($uploads)
                        ->make();
    }

    public function index() {
        $uploads = DB::table('excel_uploads')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        
        //return "Am feeling good";
        return View::make('exceluploads.index', array('uploads' => $uploads));
    }

    public function show() {
        return View::make('exceluploads.upload');
    }

    public function edit($id) {
        $user = User::find($id);
        return View::make('users.edit', array('user' => $user, 'roles' => $this->roles));
    }

    public function resolve() {

        $file = Input::file('file'); //  file upload input field in the form should be named 'file'

        //$source = Input::get('source');
        $uploaded_by = Auth::user()->id;

        $destinationPath = public_path() .'/uploads/';
        $filename = time() . '-' .$file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension(); //if you need extension of the file
        $uploadSuccess = Input::file('file')->move( $destinationPath, $filename);
        $sizeOfSuccessData = 0;
        $sizeOfFailedData = 0;

        $date = date_create();
        $currentDateTime = date_format($date, 'Y-m-d H:i:s');

        Log::info('Uploading excel file -> ' . $filename .' with extension ->' . $extension );

        if ($uploadSuccess && $extension =="xlsx") {
            //return Response::json('success', 200); // or do a redirect with some message that file was uploaded

            Log::info('File uploaded -> ' . $filename . ' :: Processing started...');


            if (is_readable( $destinationPath . $filename)) {

                Log::info('File is readable -> ' . $filename);

                $objPHPExcel = PHPExcel_IOFactory::load( $destinationPath . $filename);
                $rows = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);


                // get the column names
                $xls_fields = isset($rows[1]) ? $rows[1] : array();
                if (!empty($xls_fields))
                    unset($rows[1]);

                // xls returns $value = array('A' => 'value'); so you have to remove keys
                $fields = array();
                foreach ($xls_fields as $field) {
                    $fields[] = strtolower($field);
                }

                // find each column's position from available data set
                $location_pos = array_search('location', $fields);
                $condition_pos = array_search('condition',$fields);


                foreach ($rows as $row) {
                    // remove keys again
                    $data = array();
                    foreach ($row as $key => $value) {
                        $data[] = $value;
                    }

                    // getting data read for insertion
                    $location = $data[$location_pos];
                    $condition = $data[$condition_pos];
                    
                    
                    if($condition == "R"){
                        $condition = "Rural";
                    }else if($condition == "U"){
                        $condition = "Urban";
                    }
 
                     $success = DB::statement('update clients_sms_registration Set location_status ="' . $condition . '" where client_location = "'. $location .'" ');

                        if ($success=="success") {

                            Log::info("Client [" . $location ." :: ". $condition . "] saved!");

                        } 
                    
                }

                unset($rows);
                unset($objPHPExcel);

                // subscripe client here

                Log:: info('Processing of file completed');
                
                Session::flash('msg', 'File Uploaded successfully records saved !');
                
                Session::flash('message', "File uploaded successfully");

                 return Redirect::to('/exceluploads');
                
            } 
        } 
    }

    public function store() {

        $file = Input::file('file'); //  file upload input field in the form should be named 'file'

        //$source = Input::get('source');
        $uploaded_by = Auth::user()->id;

        $destinationPath = public_path() .'/uploads/';
        $filename = time() . '-' .$file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension(); //if you need extension of the file
        $uploadSuccess = Input::file('file')->move( $destinationPath, $filename);
        $sizeOfSuccessData = 0;
        $sizeOfFailedData = 0;

        $date = date_create();
        $currentDateTime = date_format($date, 'Y-m-d H:i:s');

        Log::info('Uploading excel file -> ' . $filename .' with extension ->' . $extension );

        if ($uploadSuccess && $extension =="xlsx") {
            //return Response::json('success', 200); // or do a redirect with some message that file was uploaded

            Log::info('File uploaded -> ' . $filename . ' :: Processing started...');


            if (is_readable( $destinationPath . $filename)) {

                Log::info('File is readable -> ' . $filename);

                $objPHPExcel = PHPExcel_IOFactory::load( $destinationPath . $filename);
                $rows = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);


                // get the column names
                $xls_fields = isset($rows[1]) ? $rows[1] : array();
                if (!empty($xls_fields))
                    unset($rows[1]);

                // xls returns $value = array('A' => 'value'); so you have to remove keys
                $fields = array();
                foreach ($xls_fields as $field) {
                    $fields[] = strtolower($field);
                }

                // find each column's position from available data set
                $contact_pos = array_search('contact', $fields);
                $age_pos = array_search('age', $fields);
                $gender_pos = array_search('gender', $fields);
                $education_pos = array_search('education', $fields);
                $location_pos = array_search('location', $fields);
                $source_pos = array_search('source',$fields);
                $region_pos = array_search('region',$fields);
                $channel_pos = array_search('channel',$fields);
                $language_pos = array_search('language',$fields);
                $location_status_pos = array_search('locationstatus',$fields);

               // Log::info("Value ->" .$objPHPExcel->getActiveSheet()->getCell('B2')->getValue());


                foreach ($rows as $row) {
                    // remove keys again
                    $data = array();
                    foreach ($row as $key => $value) {
                        $data[] = $value;
                       // Log::info("Value -> " . $value);
                    }

                    $location = "";
                    // Only use location if exists
                    if ($location_pos != false) {
                        $location = $data[$location_pos];
                    } 

                    $location_status = $data[$location_status_pos];

                    if($location_status == "R"){
                        $location_status = "Rural";
                    }else if($location_status == "U"){
                        $location_status = "Urban";
                    }
                    
                     $source = "";
                     if ($source_pos != false) {
                        $source = $data[$source_pos];
                    } 
                    
                    $region = "";
                    // Only use region if exists
                    if ($region_pos != false) {
                        $region = $data[$region_pos];
                    } 
                    
                     $channel = "";
                    // Only use channel if exists
                    if ($channel_pos != false) {
                        $channel = $data[$channel_pos];
                    } 
                    
                    $language = "";
                    // Only use langauge if exists
                    if ($language_pos != false) {
                        $language = $data[$language_pos];

                        if(strtoupper($language) == "BLANK" || $language == "" || $language == "--blank--" ){
                            $language = "ENGLISH";
                        }
                    } 


                    // getting data read for insertion
                    $contact = $data[$contact_pos];
                    $age = $data[$age_pos];
                    $gender = $data[$gender_pos];
                    $education = $data[$education_pos];
                    $campaign="";
                    $status= "Completed";
                    
                    
                    if($age >= 15 && $age <= 19 && $education =="na"){
                        $campaign = "kiki";
                    }else if($age >= 15 && $age <= 19)
                    {
                        $campaign = "ronald";
                    }else if($age >= 20 && $age <= 24){
                        $campaign = "rita";
                    }else{
                        $status ="Ineligible";
                    }
                    


                    if (trim($contact) == '' ) {
                        Log::info("Empty contact number");
                        $sizeOfFailedData ++;
                    } else {
                        
                       if($contact[0] == "0"){
                         $pattern = '/^0/';
                         $replacement = '233';
                         $contact = preg_replace($pattern, $replacement, $contact);
                       }
                        
                        if($channel == strtoupper("Voice")){
                            $channel = "V";
                        }
                        
                       // App::make('ApiController')->register($contact, strtoupper($language), $age, $gender, strtoupper($education), strtoupper($channel),$location,$region,$source );
                      // Queue::push('RegisterSubscriber', array('phone_number' => '233' . $contact , 'language' => strtoupper($language) , 'age' => $age , 'gender' => $gender , 'education_level' => strtoupper($education) , 'channel' => strtoupper($channel) , 'region' => $region , 'source' => $source ));
                        
                        Log::info("Got the following:");
                        Log::info("Contact ->" .$contact );
                        Log::info("Gender ->" .$gender );
                        Log::info("Age ->" .$age );
                        Log::info("Language ->" .$language );
                        Log::info("Education level ->" .$education );
                        Log::info("Location ->" .$location );
                        Log::info("Location Status ->" .$location_status );
                        Log::info("Region ->" .$region );
                        Log::info("Source ->" .$source );
                        
                         return;

                       $success = DB::statement('insert ignore into clients_sms_registration Set client_number ="233' . $contact . '",client_gender="' . $gender . '",client_age="' . $age . '",client_education_level="' . $education . '",status="'.$status.'" ,channel="'.$channel.'" ,created_at="' . $currentDateTime . '" , client_location="' . $location . '"  ,source = "' . $source . '"  , campaignid="' .$campaign.'" , client_region="'.$region.'" , client_language="'.$language.'" , excel="'.$filename.'" , location_status ="'.$location_status.'" ');

                       // $success="success";


                        if ($success=="success") {

                            Log::info("Client [".  $contact . "] saved!");

                            $sizeOfSuccessData ++;
                        } else {
                            $sizeOfFailedData ++;
                        }
                    }
                }

                unset($rows);
                unset($objPHPExcel);

                // subscripe client here

                Log:: info('Processing of file completed');
                DB::statement('insert into excel_uploads set file_name ="' . $filename . '",file_extension="' . $extension . '",number_of_records="' . $sizeOfSuccessData . '",status="Completed : Success[ ' . $sizeOfSuccessData . '] and Failed [' . $sizeOfFailedData . ']",created_at="' . $currentDateTime . '" ,  uploaded_by='.$uploaded_by .'');

                Session::flash('msg', 'File Uploaded successfully , Data with Success[ ' . $sizeOfSuccessData . '] and Failed [' . $sizeOfFailedData . ' ] records saved !');
                Log::info('File has Success[ ' . $sizeOfSuccessData . '] and Failed [' . $sizeOfFailedData . ' ] records');

                 Session::flash('message', "File uploaded successfully");
                 return Redirect::to('/exceluploads');
                
            } else {

                DB::statement('insert into excel_uploads set file_name ="' . $filename . '",file_extension="' . $extension . '",number_of_records="' . $sizeOfSuccessData . '",status="Error:invalid permissions on file",created_at="' . $currentDateTime . '" , uploaded_by='.$uploaded_by .'');
                 Session::flash('message', "Error loading file , check permissions on file");
                return Redirect::back()
                                ->with('errors.message', 'Error loading file , check permissions on file');
            }
        } else {

            DB::statement('insert into excel_uploads set file_name ="' . $filename . '",file_extension="' . $extension . '",number_of_records="' . 0 . '",status="Error:can not load file",created_at="' . $currentDateTime . '" , uploaded_by='.$uploaded_by .'');
            Session::flash('message', "Error loading file .Check the file extension, should be in xlsx");

            return Redirect::back()
                            ->with('errors.message', 'Error loading file .Check the file extension, should be in xlsx ');
        }
    }

}
