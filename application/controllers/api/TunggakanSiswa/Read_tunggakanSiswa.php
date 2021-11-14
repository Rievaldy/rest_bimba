<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_tunggakanSiswa extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_tunggakanSiswa');
    }

    public function index_get(){

        $params = [
            'id_tunggakan' => $this->input->get('id_tunggakan'),
            'nis' => $this->input->get('nis'),
            'id_paket' => $this->input->get('id_paket'),
            'tahun_masuk' => $this->input->get('tahun_masuk'),
            'id_user' => $this->input->get('id_user')
        ]; 
        
        $response = $this->mod_tunggakanSiswa->read_tunggakanSiswa($params);
        $this->response($response);
    }
}
?>