<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_user extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_user');
    }

    public function index_get(){
        $params = [
            'id_user' => $this->input->get('id_user'),
            'email_user' => $this->input->get('email_user'),
            'order_by' => $this->input->get('order_by'),
            'limit' => $this->input->get('limit'),
            'offset' => $this->input->get('offset'),
        ];
        $response = $this->mod_user->read_user($params);
        $this->response($response);
    }
}
?>