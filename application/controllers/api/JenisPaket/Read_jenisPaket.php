<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_jenisPaket extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jenisPaket');
    }

    public function index_get(){
        $response = $this->mod_jenisPaket->read_jenisPaket();
        $this->response($response);
    }
}
?>