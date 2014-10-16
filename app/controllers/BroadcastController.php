<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BroadcastController
 *
 * @author liman
 */
class BroadcastController extends BaseController {
   
    
      public function show() {
        return View::make('broadcast.broadcastmsg');
    }
    
    
}
