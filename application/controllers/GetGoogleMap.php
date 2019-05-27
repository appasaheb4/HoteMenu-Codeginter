<?php

class GetGoogleMap extends MY_Controller {

    //put your code here

    public function index() {
        $this->load->view('getGoogleMap/getGoogleMap');
    }

   public  function getL() {
        if (isset($_POST['submi   t_address'])) {
            $address = $_POST['address']; // Google HQ
            $prepAddr = str_replace(' ', '+', $address);
            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
            $output = json_decode($geocode);
            $latitude = $output->results[0]->geometry->location->lat;
            $longitude = $output->results[0]->geometry->location->lng;

            echo "latitude - " . $latitude;    
            echo "longitude - " . $longitude;
        }    
        
    }


}
