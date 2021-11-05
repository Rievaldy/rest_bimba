<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_historyPembayaran extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_historyPembayaran');
    }
     
    public function index_post(){
        $id_history_pembayaran = $_POST['id_history_pembayaran'];
        $response = $this->mod_historyPembayaran->delete_historyPembayaran($id_history_pembayaran);
        $this->response($response);
    }
} 
?>