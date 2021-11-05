<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Delete_siswa extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_siswa');
    }
     
    public function index_post(){
        $nis = $_POST['nis'];
        $response = $this->mod_siswa->delete_siswa($nis);
        $this->response($response);
    }
} 
?>