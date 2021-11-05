<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_siswa extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_siswa');
    }

    public function index_get(){
        $params = [
            'nis' => $this->input->get('nis'),
            'id_user' => $this->input->get('id_user'),
            'limit' => $this->input->get('limit'),
            'order_by' => $this->input->get('order_by'),
            'offset' => $this->input->get('offset')
        ];
        $response = $this->mod_siswa->read_siswa($params);
        $this->response($response);
    }
}
?>