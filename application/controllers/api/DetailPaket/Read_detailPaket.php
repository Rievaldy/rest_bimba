<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_detailPaket extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_detailPaket');
    }

    public function index_get(){
        $params = [
            'id_paket' => $this->input->get('id_paket')
        ];
        $response = $this->mod_detailPaket->read_detailPaket($params);
        $this->response($response);
    }
}
?>