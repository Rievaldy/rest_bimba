<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_historyPembayaran extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_historyPembayaran');
    }

    public function index_get(){

        $params = [
            'id_history_pembayaran' => $this->input->get('id_history_pembayaran'),
            'id_tunggakan' => $this->input->get('id_tunggakan'),
            'approved' => $this->input->get('approved'),
            'id_user' => $this->input->get('id_user'),
            'start_date' => $this->input->get('start_date'),
            'end_date' => $this->input->get('end_date')
        ]; 

        $response = $this->mod_historyPembayaran->read_historyPembayaran($params);
        $this->response($response);
    }
}
?>