<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Create_userLevel extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_userLevel');
    }
    
    public function index_post(){
        $desc_level = $_POST['desc_level'];

        $response = $this->mod_userLevel->create_userLevel($desc_level);
        $this->response($response);
    }
}
?>