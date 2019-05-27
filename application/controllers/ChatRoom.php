<?php

class ChatRoom extends MY_Controller {
 
    public function index(){
         $data['getAllUserListData'] = $this->MY_Model->getUserData();
        $this->load->view('chatroom/chatroom',$data);
    }       
}
