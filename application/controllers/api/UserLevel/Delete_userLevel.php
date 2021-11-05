<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_userLevel extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_userLevel');
    }
     
    public function index_post(){
        $id_level = $_POST['id_level'];
        $response = $this->mod_userLevel->delete_userLevel($id_level);
        $this->response($response);
    }
} 
?>