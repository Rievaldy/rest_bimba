<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_tunggakanSiswa extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_tunggakanSiswa');
    }
    public function index_post(){
        $id_tunggakan = $_POST['id_tunggakan'];
        $nis = $_POST['nis'];
        $id_paket = $_POST['id_paket'];
        $total_harus_bayar = $_POST['total_harus_bayar'];
        $baru_dibayarkan = $_POST['baru_dibayarkan'];

        $response = $response = $this->mod_tunggakanSiswa->update_tunggakanSiswa($id_tunggakan, $nis, $id_paket, $total_harus_bayar, $baru_dibayarkan);
        $this->response($response);
    }
}

?>