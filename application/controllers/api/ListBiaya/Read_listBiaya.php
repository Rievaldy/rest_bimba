<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_listBiaya extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_listBiaya');
    }

    public function index_get(){
        $params = [
            'id_biaya' => $this->input->get('id_biaya'),
            'limit' => $this->input->get('limit'),
            'order_by' => $this->input->get('order_by'),
            'offset' => $this->input->get('offset')
        ];

        $response = $this->mod_listBiaya->read_listBiaya($params);
        $this->response($response);
    }
}
?>