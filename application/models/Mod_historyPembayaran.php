<?php 

class Mod_historyPembayaran extends CI_Model{
    public function create_historyPembayaran(int $id_tunggakan, int $id_order_midtrans, int $jumlah_disetorkan, String $tanggal_transaksi){
        $data = [
            'id_tunggakan' => $id_tunggakan,
            'id_order_midtrans' => $id_order_midtrans,
            'jumlah_disetorkan' => $jumlah_disetorkan,
            'tanggal_transaksi' => $tanggal_transaksi
        ];

        $insert = $this->db->insert('history_pembayaran',$data);
        if ($insert) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully added product data';
            return $response;
         }
         return false;
    }

    public function read_jenisPaket(){
        $this->db->order_by('id_history_pembayaran','DESC');
        $query = $this->db->get('history_pembayaran');
        if($query->num_rows() > 0){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($query->result() as $row){
                $tempArray = array();
                $tempArray['id_history_pembayaran'] = $row->id_history_pembayaran;
                $tempArray['id_tunggakan'] = $row->id_tunggakan;
                $tempArray['id_order_midtrans'] = $row->id_order_midtrans;
                $tempArray['jumlah_disetorkan'] = $row->jumlah_disetorkan;
                $tempArray['tanggal_transaksi'] = $row->tanggal_transaksi;
                $response['data'][] = $tempArray;
            }
            return $response;
        }
        return false;
    }

    public function update_jenisPaket(int $id_history_pembayaran, int $id_tunggakan, int $id_order_midtrans, int $jumlah_disetorkan, String $tanggal_transaksi){
        $update = $this->db->query(
            "UPDATE `history_pembayaran`
             SET
                id_tunggakan = '$id_tunggakan',
                id_order_midtrans = '$id_order_midtrans',
                jumlah_disetorkan = '$jumlah_disetorkan',
                tanggal_transaksi = '$tanggal_transaksi'
             WHERE id_history_pembayaran = '$id_history_pembayaran' "
        );
        if($update){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully changed product data';
            return $response;
        }
        return false;
    }

    public function delete_jenisPaket(int $id_paket){
        $nis = $nis;
        $delete = $this->db->query('DELETE FROM `history_pembayaran` WHERE id_history_pembayaran = '.$id_history_pembayaran);
        if ($delete) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully deleted product data';
            return $response;
        }
        return false;
    }
}
?>