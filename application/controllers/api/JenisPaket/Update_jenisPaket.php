<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_jenisPaket extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jenisPaket');
    }
    public function index_post(){
        $params = [
            'id_paket' => $this->input->get('id_paket'),
            'desc_paket' => $this->input->get('desc_paket'),
            'masa_pembelajaran' => $this->input->get('masa_pembelajaran')
        ];

        $response = $this->mod_jenisPaket->update_jenisPaket($params);
        $this->response($response);
    }
}

?>