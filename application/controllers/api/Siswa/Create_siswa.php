<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Create_siswa extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_siswa');
    }
    
    public function index_post(){
        $params = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'id_user' => $this->input->post('id_user')
        ];
        
        $response =  $this->mod_siswa->create_siswa($params);
        $this->response($response);
    }
}
?>