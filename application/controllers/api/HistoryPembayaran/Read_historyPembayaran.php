<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_historyPembayaran extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_historyPembayaran');
    }

    public function index_get(){
        $response = $this->mod_historyPembayaran->read_historyPembayaran();
        $this->response($response);
    }
}
?>