<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GoogleMapLagLatNew
 *
 * @author appasaheb4
 */
class GoogleMapLagLatNew extends MY_Controller {
    //put your code here
    
       public function getLanLat() {   
        header('Access-Control-Allow-Origin: *');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $locationName ="Motewadi,Natepute,India";//$request->locationName;
        $prepAddr = str_replace(' ', '+', $locationName);
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
        $output = json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;   
        $alldata = $latitude . "=" . $longitude;
        json_encode($alldata);      
         }
    }
}
