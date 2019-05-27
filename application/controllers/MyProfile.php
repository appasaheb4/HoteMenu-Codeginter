<?php

class MyProfile extends MY_Controller {

    //put your code here

    public function index() {
        $data['getAdminData'] = $this->MY_Model->getAdminRegistationData();
        $this->load->view("myprofile/index", $data);
    }

    public function updateWeb() {
        $data = array(
            'fullName' => $this->input->post('fullName'),
            'userName' => $this->input->post('email')
        );
        $this->db->where('id', $this->session->userdata('userId'));
        $this->db->update('tblAdminRegistation', $data);
        echo 'update';
    }

    public function saveProfilePicWeb() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['images']['name']);
            $config['upload_path'] = 'Content/Images/WebImage/MyProfile/';
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $config['file_name'] = $new_image_name;
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['$min_width'] = '0';
            $config['min_height'] = '0';
            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('images');
            if ($upload != NULL) {
                $data = array(
                    'imagePath' => 'Content/Images/WebImage/MyProfile/' . time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['images']['name'])
                );
                $this->db->where('id', $this->session->userdata('userId'));
                $this->db->update('tblAdminRegistation', $data);
                $this->session->set_flashdata('adminBackEnd', 'MyProfile Image Upload.');
                header("Location: http://menuapphybrid.newapptec.com/AdminDashboard");
            } else {
                echo 'Not upload';
            }
        }
    }

    public function changePasswordWeb() {
        $query = $this->db->select('password')
                ->where('id', $this->session->userdata('userId'))
                ->get('tblAdminRegistation');
        if ($query->num_rows() > 0) {  //Ensure that there is at least one result 
            foreach ($query->result_array() as $row) { //Iterate through results
                $databaseOldPass = $row['password'];
                $oldPassword = $this->input->post('oldpass');
                if ($databaseOldPass == $oldPassword) {
                    $data = array(
                        'password' => $this->input->post('newpass')
                    );
                    $this->db->where('id', $this->session->userdata('userId'));
                    $this->db->update('tblAdminRegistation', $data);
                    echo "Password are changed.";
                } else {
                    echo "Plz Old Password Correct Insert.";
                }
            }
        }
    }

    //for Mobile


    public function getUserAllInformation() {
        header('Access-Control-Allow-Origin: *');
        $postdata12 = file_get_contents("php://input");
        $request14 = json_decode($postdata12);
        $id = $request14->id;
        $return_arr = array();
        $allresult = array();
        $this->db->where("id", $id);
        $query = $this->db->get('tblUserRegistation');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['name'] = $row['name'];
                $row_array['mobileNo'] = $row['mobileNo'];
                $row_array['email'] = $row['email'];
                $row_array['address'] = $row['address'];
                $row_array['area'] = $row['area'];
                $row_array['city'] = $row['city'];
                $row_array['pin'] = $row['pin'];
                $row_array['state'] = $row['state'];
                $row_array['country'] = $row['country'];
                $row_array['imagePath'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath'];
                array_push($return_arr, $row_array);
            }
            $allresult['userAllInformation'] = $return_arr;
            echo json_encode($allresult);
        }
    }

    //update data for mobile app

    public function updateDataMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $name = $request->name;
        $mobileNo = $request->mobileNo;
        $email = $request->email;
        $address = $request->address;
        $area = $request->area;
        $city = $request->city;
        $pincode = $request->pincode;
        $state = $request->state;
        $country = $request->country;
        $userId = $request->userId;
        if (!empty($name)) {
            $data = array(
                'name' => $name,
                'mobileNo' => $mobileNo,
                'email' => $email,
                'address' => $address,
                'area' => $area,
                'city' => $city,
                'pin' => $pincode,
                'state' => $state,
                'country' => $country
            );
            $this->db->where('id', $userId);
            $this->db->update('tblUserRegistation', $data);
            echo json_encode("yes");
        } else {
            echo json_encode("yes");
        }
    }

    public function mobileUploadImage() {
        header('Access-Control-Allow-Origin: *');
        $options = file_get_contents("php://input");
        $request = json_decode($options);
        $userId = basename($_POST['userId']);
        $target_path = "Content/Images/WebImage/MyProfile/";
        $target_path1 = $target_path . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path1)) {
            $data = array(
                'imagePath' => $target_path1
            );
            $this->db->where('id', $userId);
            $this->db->update('tblUserRegistation', $data);
            echo json_encode("yes");
        }
    }

    public function changePasswordMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $oldPass = $request->oldPass;
        $newPass = $request->newPass;
        $userId = $request->userId;
        $this->db->where('password', $oldPass);
        $this->db->where('id', $userId);
        $query = $this->db->get('tblUserRegistation');
        if ($query->num_rows() > 0) {   
            foreach ($query->result_array() as $row) {
                $data = array(
                    'password' => $newPass
                );
                $this->db->where('id', $userId);
                $this->db->update('tblUserRegistation', $data);
                echo json_encode("yes");
            }   
        } else {
            echo json_encode("no");
        }
    }

}
