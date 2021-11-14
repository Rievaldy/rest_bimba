<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_detailPaket extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_detailPaket');
    }
     
    public function index_post(){
        $params = [
            'id_biaya' => $this->input->post('id_biaya'),
            'id_paket' => $this->input->post('id_paket')
        ];
        $response = $this->mod_detailPaket->delete_detailPaket($params);
        $this->response($response);
    }
} 
?>