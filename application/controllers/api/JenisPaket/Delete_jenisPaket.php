<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_jenisPaket extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jenisPaket');
    }
     
    public function index_post(){
        $id_paket = $_POST['id_paket'];
        $response = $this->mod_jenisPaket->delete_jenisPaket($id_paket);
        $this->response($response);
    }
} 
?>