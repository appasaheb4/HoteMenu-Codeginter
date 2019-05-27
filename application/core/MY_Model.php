<?php

class MY_Model extends CI_Model {

    public function getAdminData() {
        $this->db->order_by("id", "desc");
        $q = $this->db->get("tblAdminRegistation");
        return $q->result_array();
    }

    public function getUserData() {
        $this->db->order_by("id", "desc");
        $q = $this->db->get("tblUserRegistation");
        return $q->result_array();
    }

    public function getAdminRegistationData() {
        $this->db->order_by("id", "desc");
        $q = $this->db->get("tblAdminRegistation");
        return $q->result_array();
    }

    public function getAddMenuData() {
        $this->db->order_by("id", "desc");
        $q = $this->db->get("tblAddMenu");
        return $q->result_array();
    }

    public function getIserMenuData() {
        $this->db->order_by("id", "desc");
        $q = $this->db->get("tblUserAddMenu");
        return $q->result_array();
    }

    //Row Coounting
    public function getRowCountUserList() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tblUserRegistation');
        return $query->num_rows();
    }

}
