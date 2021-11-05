<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_listBiaya extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_listBiaya');
    }
    public function index_post(){
        $id_biaya = $_POST['$id_biaya'];
        $desc_biaya = $_POST['desc_biaya'];
        $harga = $_POST['harga'];

        $response = $this->mod_listBiaya->update_listBiaya($id_biaya, $desc_biaya, $harga);
        $this->response($response);
    }
}

?>