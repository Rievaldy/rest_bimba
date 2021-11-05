<?php 

require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Create_historyPembayaran extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_historyPembayaran');
    }
    
    public function index_post(){
        $id_tunggakan = $_POST['id_tunggakan'];
        $id_order_midtrans = $_POST['id_order_midtrans'];
        $jumlah_disetorkan = $_POST['jumlah_disetorkan'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];

        $response =  $this->mod_historyPembayaran->create_historyPembayaran($id_tunggakan, $id_order_midtrans, $jumlah_disetorkan, $tanggal_transaksi);
        $this->response($response);
    }
}
?>