<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_tunggakanSiswa extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_tunggakanSiswa');
    }

    public function index_get(){
        $response = $this->mod_tunggakanSiswa->read_tunggakanSiswa();
        $this->response($response);
    }
}
?>