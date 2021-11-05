<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_listBiaya extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_listBiaya');
    }
     
    public function index_post(){
        $id_biaya = $_POST['id_biaya'];
        $response = $this->mod_listBiaya->delete_listBiaya($id_biaya);
        $this->response($response);
    }
} 
?>