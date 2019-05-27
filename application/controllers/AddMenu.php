<?php

class AddMenu extends MY_Controller {

    public function index() {
        $data ['getAddMenuData'] = $this->MY_Model->getAddMenuData();
        $this->load->view('addMenu/index', $data);
    }

    public function insertWeb() {
        $imageName1 = $_FILES['fimagefile']['name'];
        $imageName2 = $_FILES['simagefile']['name'];
        $imageName3 = $_FILES['timagefile']['name'];
        $imageName4 = $_FILES['fourimagefile']['name'];
        $imageName5 = $_FILES['fiveimagefile']['name'];
        $imageName6 = $_FILES['sixImagefile']['name'];
        $imageName7 = $_FILES['sevenimagefile']['name'];
        $imageName8 = $_FILES['eigthimagefile']['name'];
        $imageName9 = $_FILES['nighenimagefile']['name'];
        $imageName10 = $_FILES['tenimagefile']['name'];
        // $th1_tmp10 = $_FILES['tenimagefile']['tmp_name'];
        // move_uploaded_file($th1_tmp10, "Content/Images/WebImage/tblAddMenu/$imageName10");
   

        date_default_timezone_set('Asia/Kolkata');
        $data = array(
            'date' => $this->input->post('txtDate'),
            'time' => date("h:i:sa"),
            'restName' => $this->input->post('txtRestName'),
            'type' => $this->input->post('type'),
            'phoneNo1' => $this->input->post('txtPhone1'),
            'phoneNo2' => $this->input->post('txtPhone2'),
            'address' => $this->input->post('txtAddress'),
            'area' => $this->input->post('txtArea'),
            'suburb' => $this->input->post('txtSubrb'),
            'city' => $this->input->post('txtCity'),
            'pincode' => $this->input->post('txtPinCode'),
            'state' => $this->input->post('txtState'),
            'imagePath1' => 'Content/Images/WebImage/tblAddMenu/' . $imageName1,  
            'imagePath2' => 'Content/Images/WebImage/tblAddMenu/' . $imageName2,
            'imagePath3' => 'Content/Images/WebImage/tblAddMenu/' . $imageName3,
            'imagePath4' => 'Content/Images/WebImage/tblAddMenu/' . $imageName4,
            'imagePath5' => 'Content/Images/WebImage/tblAddMenu/' . $imageName5,
            'imagePath6' => 'Content/Images/WebImage/tblAddMenu/' . $imageName6,
            'imagePath7' => 'Content/Images/WebImage/tblAddMenu/' . $imageName7,
            'imagePath8' => 'Content/Images/WebImage/tblAddMenu/' . $imageName8,
            'imagePath9' => 'Content/Images/WebImage/tblAddMenu/' . $imageName9,
            'imagePath10' => 'Content/Images/WebImage/tblAddMenu/' . $imageName10,
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tblAddMenu', $data);
        //$bodyAdd='<b>'. $this->input->post('txtRestName') . '</b>' .'<br/>'.$this->input->post('txtArea').' , '.$this->input->post('txtCity');
        $bodyAdd = $this->input->post('txtRestName') . '  ' . $this->input->post('txtArea') . ' , ' . $this->input->post('txtCity');
        $imagebody = 'http://menuapphybrid.newapptec.com/Content/Images/WebImage/tblAddMenu/' . $imageName1;
        /// $this->sentNotificationAll($bodyAdd, $imagebody);
        $this->session->set_flashdata('adminBackEnd', 'AddMenu Save Data.');
        header("Location: http://menuapphybrid.newapptec.com/AdminDashboard");
    }

    public function updateWeb() {
        $data = array(
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'restName' => $this->input->post('restName'),
            'type' => $this->input->post('type'),
            'phoneNo1' => $this->input->post('phoneNo1'),
            'phoneNo2' => $this->input->post('phoneNo2'),
            'address' => $this->input->post('address'),
            'area' => $this->input->post('area'),
            'suburb' => $this->input->post('subrub'),
            'city' => $this->input->post('city'),
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tblAddMenu', $data);
        echo 'update';
    }

    public function deleteWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tblAddMenu');
        echo 'Delete Data.';
    }

    public function excel() {
        require (APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require (APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                ->setCreator("Kumar sir .")
                ->setLastModifiedBy("")
                ->setTitle("Admin Menu List")
                ->setSubject("Admin Menu List")
                ->setDescription("appasaheb lakade (full stack developer)");
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', "Date");
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', "Time");
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', "Restaurant Name");
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', "Type");
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', "Phone Number 1");
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', "Phone Number 2");
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', "Address");
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', "Area");
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', "Suburb");
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', "City");
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', "PinCode");
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', "State");
        $rowNo = 2;
        $data['getAdminAddClass'] = $this->MY_Model->getAddMenuData();
        foreach ($data['getAdminAddClass'] as $row) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowNo, $row['date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowNo, $row['time']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowNo, $row['restName']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowNo, $row['type']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowNo, $row['phoneNo1']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowNo, $row['phoneNo2']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowNo, $row['address']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowNo, $row['area']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowNo, $row['suburb']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowNo, $row['city']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowNo, $row['pincode']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowNo, $row['state']);
            $rowNo++;
        }
        $filename = "Admin Menu List  " . date("Y-m-d H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Add Menu List");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function upload_file() {
        $target_path = "Content/Images/WebImage/tblAddMenu/";
        $target_path1 = $target_path . basename($_FILES['file']['name']);
        $config['upload_path'] = $target_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        } else {
            $config['image_library'] = 'gd2';
            $config['source_image'] = $target_path1;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '80%';   
            $config['width'] = 1420;   
            $config['height'] = 1420;  
            $config['new_image'] = $target_path1;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        }
        echo "File upload done.";
    }

    public function getAddMenuMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $userId = $request->userId;
        $return_arr = array();
        $allresult = array();
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");
        $count = 0;
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tblAddMenu');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $this->db->where("id", $userId);
                $queryIn = $this->db->get('tblUserRegistation');
                if ($queryIn->num_rows() > 0) {
                    foreach ($queryIn->result_array() as $rowIn) {
                        $city = $rowIn['city'];
                        $area = $rowIn['suburb'];
                        if (strtoupper($city) == strtoupper($row['city']) && strtoupper($area) == strtoupper($row['suburb'])) {
                            $row_array['id'] = $row['id'];
                            $row_array['date'] = $row['date'];
                            $row_array['time'] = $row['time'];
                            $row_array['restName'] = $row['restName'];
                            $row_array['type'] = $row['type'];
                            $row_array['area'] = $row['area'];
                            $row_array['suburb'] = $row['suburb'];
                            $row_array['city'] = $row['city'];
                            $row_array['state'] = $row['state'];
                            $row_array['phoneNo1'] = $row['phoneNo1'];
                            $row_array['imagePath1'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath1'];
                            if ($date == $row['date']) {
                                $count++;
                            }
                            $row_array['count'] = $count;
                            array_push($return_arr, $row_array);
                        }
                    }
                }
            }
            $allresult['menulist'] = $return_arr;
            echo json_encode($allresult);
        }
    }

    public function getAddMenuMobileAll() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");  
        $count = 0;
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tblAddMenu');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['restName'] = $row['restName'];
                $row_array['type'] = $row['type'];
                $row_array['area'] = $row['area'];
                $row_array['suburb'] = $row['suburb'];
                $row_array['city'] = $row['city'];
                 $row_array['state'] = $row['state'];
                $row_array['phoneNo1'] = $row['phoneNo1'];
                $row_array['imagePath1'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath1'];
                if ($date == $row['date']) {
                    $count++;
                }
                $row_array['count'] = $count;
                array_push($return_arr, $row_array);
            }
        }
        $allresult['menulistAll'] = $return_arr;
        echo json_encode($allresult);
    }

    public function getUserMenuListIdWise() {
        header('Access-Control-Allow-Origin: *');
        $return_arr = array();
        $allresult = array();
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $id = $request->id;
        $this->db->where("id", $id);
        $query = $this->db->get('tblAddMenu');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['restName'] = $row['restName'];
                $row_array['area'] = $row['area'];
                $row_array['city'] = $row['city'];
                $row_array['type'] = $row['type'];
                $row_array['area'] = $row['area']; 
                $row_array['suburb'] = $row['suburb'];
                $row_array['phoneNo1'] = $row['phoneNo1'];  
                $row_array['city'] = $row['city'];
                 $row_array['state'] = $row['state'];
                $row_array['imagePath1'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath1'];
                $row_array['imagePath2'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath2'];
                $row_array['imagePath3'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath3'];
                $row_array['imagePath4'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath4'];
                $row_array['imagePath5'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath5'];
                $row_array['imagePath6'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath6'];
                $row_array['imagePath7'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath7'];
                $row_array['imagePath8'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath8'];
                $row_array['imagePath9'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath9'];
                $row_array['imagePath10'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath10'];
                array_push($return_arr, $row_array);
            }
            $allresult['showMenuList'] = $return_arr;
            echo json_encode($allresult);
        }
    }

    public function sentNotificationAll($message, $image) {
//        $request = file_get_contents('php://input');
//        $input = json_decode($request, true);  
//        $return_arr = array();
//        $query = $this->db->get('tblUserRegistation');
//        if ($query->num_rows() > 0) {
//            foreach ($query->result_array() as $row) {
//                //$return_arr = $row['tokenNo'];
//                $tokenid = $row['tokenNo'];
//                $title = "New Restaurants Added.";
//                $body = $message;
//                $icon = $image;
//                   
//            }
//          
//        }
//        $title = "New Restaurants Added.";
//        $body = $message;
//        $icon = $image;  
//        include_once 'sentNo.php';
    }

}
