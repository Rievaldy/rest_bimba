<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_userAccess extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_userAcces');
    }
     
    public function index_post(){
        $email_user = $_POST['email_user'];
        $response = $this->mod_userAccess->delete_userAccess($email_user);
        $this->response($response);
    }
} 
?>