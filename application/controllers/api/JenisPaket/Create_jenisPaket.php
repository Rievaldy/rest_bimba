<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Create_jenisPaket extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jenisPaket');
    }
    
    public function index_post(){

        $params = [
            'desc_paket' => $this->input->post('desc_paket'),
            'masa_pembelajaran' => $this->input->post('masa_pembelajaran')
        ];

        $response =  $this->mod_jenisPaket->create_jenisPaket($params);
        $this->response($response);
    }
}
?>