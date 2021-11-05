<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_jenisPaket extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jenisPaket');
    }
    public function index_post(){
        $id_paket = $_POST['$id_paket'];
        $desc_paket = $_POST['desc_paket'];
        $masa_pembelajaran = $_POST['masa_pembelajaran'];

        $response = $this->mod_jenisPaket->update_jenisPaket($id_paket, $desc_paket, $masa_pembelajaran);
        $this->response($response);
    }
}

?>