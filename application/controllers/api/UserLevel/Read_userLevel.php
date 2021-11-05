<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_userLevel extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_userLevel');
    }

    public function index_get(){
        $response = $this->mod_userLevel->read_userLevel();
        $this->response($response);
    }
}
?>