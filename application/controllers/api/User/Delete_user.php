<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_product extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_user');
    }
     
    public function index_post(){
        $id_user = $_POST['id_user'];
        $response = $this->mod_user->delete_product($id_user);
        $this->response($response);
    }
} 
?>