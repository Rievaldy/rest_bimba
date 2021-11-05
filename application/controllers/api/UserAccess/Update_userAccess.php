<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_userAccess extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_userAccess');
    }
    public function index_post(){
        $params = [
            'email_user' => $this->input->post('email_user'),
            'password_user' => $this->input->post('password_user'),
            'id_level' => $this->input->post('id_level')
        ];

        $response = $response = $this->mod_userAccess->update_userAccess($params);
        $this->response($response);
    }
}

?>