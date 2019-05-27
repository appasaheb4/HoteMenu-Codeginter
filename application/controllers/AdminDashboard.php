<?php

class AdminDashboard extends MY_Controller {

    public function index() {
        $userType = $this->session->userdata('loginType');    
        $data ['getUserData'] = $this->MY_Model->getAdminData();   
        $data['userCont'] = $this->MY_Model->getRowCountUserList();
        $date = date('Y-m-d');
        if (file_exists("Content/BackUp/MenuApp_' . $date . '.sql.zip")) {
            unlink("Content/BackUp/MenuApp_' . $date . '.sql.zip");
        }   
        if ($userType == "Admin") {
            $this->load->view('adminDashboard/index', $data);
        } else if ($userType == "User") {
            echo 'Contact to admin team.';
        } else {
            $this->load->view('LoginPage/index');
        }
    }    
}
