<?php

class AddRestaurantsMo extends MY_Model {

    public function getAllUserMenuList() {
        $return_arr = array();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tblUserAddMenu');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['restName'] = $row['restName'];
                $row_array['type'] = $row['type'];
                $row_array['phoneNo1'] = $row['phoneNo1'];
                $row_array['phoneNo2'] = $row['phoneNo2'];
                $row_array['address'] = $row['address'];
                $row_array['area'] = $row['area'];
                $row_array['suburb'] = $row['suburb'];
                $row_array['city'] = $row['city'];
                $row_array['pincode'] = $row['pincode'];
                $row_array['state'] = $row['state'];
                $row_array['imagePath1'] = $row['imagePath1'];
                $row_array['imagePath2'] = $row['imagePath2'];
                $row_array['imagePath3'] = $row['imagePath3'];
                $row_array['imagePath4'] = $row['imagePath4'];
                $row_array['imagePath5'] = $row['imagePath5'];
                $row_array['imagePath6'] = $row['imagePath6'];
                $row_array['imagePath7'] = $row['imagePath7'];
                $row_array['imagePath8'] = $row['imagePath8'];
                $row_array['imagePath9'] = $row['imagePath9'];
                $row_array['imagePath10'] = $row['imagePath10'];

                $userId = $row['userId'];
                $this->db->where('id', $userId);
                $query1 = $this->db->get('tblUserRegistation');
                if ($query1->num_rows() > 0) {
                    foreach ($query1->result_array() as $row1) {
                        $row_array['userName'] = $row1['name'];
                        $row_array['userMobileNo'] = $row1['mobileNo'];
                        $row_array['userArea'] = $row1['area'];
                        $row_array['userCity'] = $row1['city'];
                    }
                }
            array_push($return_arr, $row_array);
            }
            return $return_arr;
        }
    }

}
