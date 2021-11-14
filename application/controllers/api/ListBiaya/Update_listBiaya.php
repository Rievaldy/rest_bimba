<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_listBiaya extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_listBiaya');
    }
    public function index_post(){
        $params = [
            'id_biaya' => $this->input->post('id_biaya'),
            'desc_biaya' => $this->input->post('desc_biaya'),
            'harga' => $this->input->post('harga'),
            'pembayaran_berkala' => $this->input->post('pembayaran_berkala')
        ];

        $response = $this->mod_listBiaya->update_listBiaya($params);
        $this->response($response);
    }
}

?>