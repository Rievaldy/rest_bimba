<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Create_user extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_user');
    }
    
    public function index_post(){

        $params = [
            'email_user' => $this->input->post('email_user'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw')
        ];

        $response = $response = $this->mod_user->create_user($params);
        $this->response($response);
    }
}
?>