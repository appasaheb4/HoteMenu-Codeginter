<?php

class LoginPage extends MY_Controller {

    public function index() {
        $userType = $this->session->userdata('loginType');
        $userId = $this->session->userdata('userId');

        $data ['getUserData'] = $this->MY_Model->getAdminData();
        if (!empty($userType) && !empty($userId))
            $this->load->view('adminDashboard/index', $data);
        else
            $this->load->view('loginPage/index');
    }

    public function loginWeb() {
        $this->db->where('userName', $this->input->post('email'));
        $this->db->where('password', $this->input->post('password'));
        $this->db->where('status', 'Active');
        $query = $this->db->get('tblAdminRegistation');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $currentId = $row['id'];
                $loginCont = $row['loginCont'] + 1;
                $this->session->sess_expiration = '157680000'; // expires in 5 Year
                $this->session->set_userdata('username', $row['fullName']);
                $this->session->set_userdata('userId', $currentId);
                $this->session->set_userdata('loginType', $row['loginType']);
                $dataup = array(
                    'loginCont' => $loginCont,
                    'runningStatus' => 'Running'
                );
                $this->db->where('id', $currentId);
                $this->db->update('tblAdminRegistation', $dataup);
                $this->session->set_flashdata('registationFlash', 'Login done.');
            }
        } else {
            $this->session->set_flashdata('registationFlash', 'Login not done.');
        }
        header("Location: http://menuapphybrid.newapptec.com/LoginPage");
        //redirect(base_url().'LoginPage');
    }

    public function forGetPasswordWeb() {
        require (APPPATH . 'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $username = $this->input->post('txtEmail');
        $this->db->where('userName', $username);
        $query = $this->db->get('tblAdminRegistation');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $mail = new PHPMailer(true);
                $mail->IsSendmail();
                $mail->setFrom('menuapp@newapptec.com', 'Menu Card');
                $mail->addReplyTo('menuapp@newapptec.com', 'Menu Card');
                $mail->addAddress($username, $username);
                $mail->Subject = "Forgot Password";
                $mail->msgHTML('<html><body><b>User Name: ' . $username . '!</b><br/><b>Your password is : </b>' . $row['password'] . '<br/></body></html>');
                $mail->isHTML(true);
                $mail->AltBody = 'This is a plain-text message body';
                if (!$mail->send()) {
                    $this->session->set_flashdata('registationFlash', 'Email not Sent.');
                } else {
                    $this->session->set_flashdata('registationFlash', 'Email Sent.');
                }     
            }
        } else {
            $this->session->set_flashdata('registationFlash', 'Email not Sent.');
        }
         header("Location: http://menuapphybrid.newapptec.com/LoginPage");
    }

    public function forGetPassMobile() {
        require (APPPATH . 'third_party/PHPMailer-master/PHPMailerAutoload.php');
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $username = $request->email;
        $this->db->where('email', $username);
        $query = $this->db->get('tblUserRegistation');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $mail = new PHPMailer(true);
                $mail->IsSendmail();
                $mail->setFrom('menuapp@newapptec.com', 'Menu Card');
                $mail->addReplyTo('menuapp@newapptec.com', 'Menu Card');
                $mail->addAddress($username, $username);
                $mail->Subject = "Forgot Password";
                $mail->msgHTML('<html><body><b>User Name: ' . $username . '</b><br/><b>Your password is : </b>' . $row['password'] . '<br/></body></html>');
                $mail->isHTML(true);
                $mail->AltBody = 'This is a plain-text message body';
                if (!$mail->send()) {
                    echo json_encode("no");
                } else {
                    echo json_encode("yes");
                }
            }
        } else {
            echo json_encode("no");
        }
    }

    //For Mobile
    public function registationMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");
        $time = date("h:i:sa");
        $name = $request->name;
        $mobileNo = $request->mobileNo;
        $email = $request->email;
        $address = $request->address;
        $area = $request->area;
        $suburb = $request->suburb;
        $city = $request->city;
        $pin = $request->pin;
        $state = $request->state;
        $country = $request->country;
        $pass = $request->pass;
        $tokenNo = $request->tokenNo;
        if (!empty($name)) {
            $data = array(
                'date' => $date,
                'time' => $time,
                'name' => $name,
                'mobileNo' => $mobileNo,
                'email' => $email,
                'address' => $address,
                'area' => $area,
                'suburb' => $suburb,
                'city' => $city,
                'pin' => $pin,
                'state' => $state,
                'country' => $country,
                'password' => $pass,
                'imagePath' => 'Content/Images/WebImage/MyProfile/myProfileDefultIcon.png',
                'loginCont' => 1,
                'status' => 'Active',
                'tokenNo' => $tokenNo,
                'runningStatus' => 'Running'
            );
            $this->db->insert('tblUserRegistation', $data);
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }

    public function loginMobile() {
        header('Access-Control-Allow-Origin: *');
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $mobileNo = $request->mobileNo;
        $password = $request->password;
        $tokenNoNew = $request->tokenNo;
        $return_arr = array();
        $allresult = array();
        $this->db->where('mobileNo', $mobileNo);
        $this->db->where('password', $password);
        $query = $this->db->get('tblUserRegistation');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $newId = $row['id'];
                $alldata = "yes" . "=" . $newId;
                echo json_encode($alldata);
                $this->tokenNoUpdate($tokenNoNew, $newId);
            }
        } else {
            echo json_encode('no');
        }
    }

    public function tokenNoUpdate($val, $newId) {
        $data = array(
            'tokenNo' => $val
        );
        $this->db->where('id', $newId);
        $this->db->update('tblUserRegistation', $data);
    }

    public function logout() {
        $dataup = array(
            'runningStatus' => 'Not Running'
        );
        $this->db->where('id', $this->session->userdata('userId'));
        $this->db->update('tblAdminRegistation', $dataup);
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('loginType');
        header("Location: http://menuapphybrid.newapptec.com/LoginPage");
    }

}
