<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_tunggakanSiswa extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_tunggakanSiswa');
    }
     
    public function index_post(){
        $id_tunggakan = $_POST['id_tunggakan'];
        $response = $this->mod_tunggakanSiswa->delete_tunggakanSiswa($id_tunggakan);
        $this->response($response);
    }
} 
?>