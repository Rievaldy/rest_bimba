<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_jenisPaket extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jenisPaket');
    }

    public function index_get(){
        $params = [
            'id_paket' => $this->input->get('id_paket'),
            'limit' => $this->input->get('limit'),
            'order_by' => $this->input->get('order_by'),
            'offset' => $this->input->get('offset')
        ];
        $response = $this->mod_jenisPaket->read_jenisPaket($params);
        $this->response($response);
    }
}
?>