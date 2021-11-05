<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_userLevel extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_userLevel');
    }
    public function index_post(){
        $id_level = $_POST['id_level'];
        $desc_level = $_POST['desc_level'];

        $response = $response = $this->mod_userLevel->update_userLevel($id_level, $desc_level);
        $this->response($response);
    }
}

?>