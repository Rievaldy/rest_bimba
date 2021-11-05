<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Read_userAccess extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_userAccess');
    }

    public function index_get(){

        $params = [
            'id_level' => $this->input->get('id_level'),
            'email_user' => $this->input->get('email_user'),
            'password_user' => $this->input->get('password_user'),
            'limit' => $this->input->get('limit'),
            'order_by' => $this->input->get('order_by'),
            'offset' => $this->input->get('offset')
        ];
        $response = $this->mod_userAccess->read_userAccess($params);
        $this->response($response);
    }
}
?>