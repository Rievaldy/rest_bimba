<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_detailPaket extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_detailPaket');
    }
     
    public function index_post(){
        $id_biaya = $_POST['id_biaya'];
        $id_paket = $_POST['id_paket'];

        $response = $this->mod_detailPaket->delete_detailPaket($id_biaya, $id_paket);
        $this->response($response);
    }
} 
?>