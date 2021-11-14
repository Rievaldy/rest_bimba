<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Update_tunggakanSiswa extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_tunggakanSiswa');
    }
    public function index_post(){

        $params = [
            'id_tunggakan' => $this->input->post('id_tunggakan'),
            'nis' => $this->input->post('nis'),
            'id_paket' => $this->input->post('id_paket'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'total_harus_bayar' => $this->input->post('total_harus_bayar'),
            'baru_dibayarkan' => $this->input->post('baru_dibayarkan')
        ]; 

        $response = $response = $this->mod_tunggakanSiswa->update_tunggakanSiswa($params);
        $this->response($response);
    }
}

?>