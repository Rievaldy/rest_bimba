<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_historyPembayaran extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_historyPembayaran');
    }
    public function index_post(){

        $params = [
            'id_history_pembayaran' => $this->input->post('id_history_pembayaran'),
            'id_tunggakan' => $this->input->post('id_tunggakan'),
            'jumlah_disetorkan' => $this->input->post('jumlah_disetorkan'),
            'approved' => $this->input->post('approved')
        ]; 

        $response = $this->mod_historyPembayaran->update_historyPembayaran($params);
        $this->response($response);
    }
}

?>