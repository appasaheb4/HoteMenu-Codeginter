<?php

class AddRestaurants extends MY_Controller {

    public function index() {
        $this->load->model('AddRestaurantsMo');
        $data ['getUserMenuData'] = $this->AddRestaurantsMo->getAllUserMenuList();
        $this->load->view('addRestaurants/index', $data);
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
            'suburb' => $this->input->post('suburb'),
            'city' => $this->input->post('city'),
            'pincode' => $this->input->post('pincode'),  
            'state' => $this->input->post('state')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tblUserAddMenu', $data);
        echo 'update';
    }

    public function deleteWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tblUserAddMenu');
        echo 'Delete Data.';
    }

    public function excel() {
        require (APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require (APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                ->setCreator("Kumar sir .")
                ->setLastModifiedBy("")
                ->setTitle("User Menu List")
                ->setSubject("")
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
        $data['getAdminAddClass'] = $this->MY_Model->getIserMenuData();
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
        $filename = "User Menu List  " . date("Y-m-d H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Add Menu List");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function mobileUploadImage() {
        header('Access-Control-Allow-Origin: *');
        $target_path = "Content/Images/WebImage/tblAdminRegistation/";
        $target_path1 = $target_path . basename($_FILES['file']['name']);


                $config['upload_path'] = $target_path;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                {  
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
                     echo json_encode("yes");   
                }        
    }

    //For Mobile
    public function addUserMenuList() {
        header('Access-Control-Allow-Origin: *');

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $date = $request->date;
        $time = date("h:i:sa");
        $restName = $request->restName;
        $type = $request->typeValue;
        $phoneNo1 = $request->phoneNo1;
        $phoneNo2 = $request->phoneNo2;
        $address = $request->address;
        $area = $request->area;
        $suburb = $request->suburb;
        $city = $request->city;
        $pincode = $request->pincode;
        $state = $request->state;
        $userId = $request->userId;
        $image1 = $request->image1;
        $image2 = $request->image2;
        $image3 = $request->image3;
        $image4 = $request->image4;
        $image5 = $request->image5;
        $image6 = $request->image6;
        $image7 = $request->image7;
        $image8 = $request->image8;
        $image9 = $request->image9;
        $image10 = $request->image10;
        $path = 'Content/Images/WebImage/tblAdminRegistation/';
        if (!empty($restName)) {
            $data = array(
                'date' => $date,
                'time' => $time,
                'restName' => $restName,
                'type' => $type,
                'phoneNo1' => $phoneNo1,
                'phoneNo2' => $phoneNo2,
                'address' => $address,
                'area' => $area,
                'suburb' => $suburb,
                'city' => $city,
                'pincode' => $pincode,
                'state' => $state,
                'imagePath1' => $path . $image1,
                'imagePath2' => $path . $image2,
                'imagePath3' => $path . $image3,
                'imagePath4' => $path . $image4,
                'imagePath5' => $path . $image5,
                'imagePath6' => $path . $image6,
                'imagePath7' => $path . $image7,
                'imagePath8' => $path . $image8,
                'imagePath9' => $path . $image9,
                'imagePath10' => $path . $image10,
                'userId' => $userId,
            );
            $this->db->insert('tblUserAddMenu', $data);
            echo json_encode("yes");
        }
    }

    //for Mobile

    public function getUserAddMenuMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $userId = $request->userId;
        $return_arr = array();
        $allresult = array();
        $this->db->where("userId", $userId);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tblUserAddMenu');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['restName'] = $row['restName'];
                $row_array['area'] = $row['area'];
                $row_array['suburb'] = $row['suburb'];
                $row_array['city'] = $row['city'];
                 $row_array['state'] = $row['state'];
                $row_array['type'] = $row['type'];
                $row_array['phoneNo1'] = $row['phoneNo1'];
                $row_array['imagePath1'] = 'http://menuapphybrid.newapptec.com/' . $row['imagePath1'];
                array_push($return_arr, $row_array);
            }
            $allresult['UserAddmenulist'] = $return_arr;
            echo json_encode($allresult);
        }
    }

    public function getUserMenuListIdWise() {
        header('Access-Control-Allow-Origin: *');
        $return_arr = array();
        $allresult = array();
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $id = $request->id;
        $this->db->where("id", $id);
        $query = $this->db->get('tblUserAddMenu');
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
                $row_array['city'] = $row['city'];
                 $row_array['state'] = $row['state'];
                $row_array['phoneNo1'] = $row['phoneNo1'];
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

    public function deleteMobileMenuList() {
        header('Access-Control-Allow-Origin: *');
        $postdataSecound = file_get_contents("php://input");
        $request = json_decode($postdataSecound);
        $id = $request->id;
        $this->db->where('id', $id);
        $this->db->delete('tblUserAddMenu');
        echo json_encode('yes');
    }

    public function UpdateMobileMenuList() {
        header('Access-Control-Allow-Origin: *');
        $postdata21 = file_get_contents("php://input");
        $request = json_decode($postdata21);
        $restName = $request->restName;
        $phoneNo1 = $request->phoneNo1;
        $phoneNo2 = $request->phoneNo2;
        $id = $request->id;
        $data = array(
            'restName' => $restName,
            'phoneNo1' => $phoneNo1,
            'phoneNo2' => $phoneNo2
        );
        $this->db->where('id', $id);
        $this->db->update('tblUserAddMenu', $data);
        $output = 'yes';
        echo json_encode($output);
    }
  
}
