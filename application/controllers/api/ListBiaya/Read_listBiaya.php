<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_listBiaya extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_listBiaya');
    }

    public function index_get(){
        $response = $this->mod_listBiaya->read_listBiaya();
        $this->response($response);
    }
}
?>