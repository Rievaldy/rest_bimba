<?php 

class Mod_historyPembayaran extends CI_Model{
    public function create_historyPembayaran($params){
        $data = [
            'id_history_pembayaran' => $params['id_history_pembayaran'],
            'id_tunggakan' => $params['id_tunggakan'],
            'jumlah_disetorkan' => $params['jumlah_disetorkan'],
            'approved' => $params['approved']
        ];

        $insert = $this->db->insert('history_pembayaran',$data);
        if($insert){
            $response['message'] = 'Successfully add user data';
            $response['status'] = 200;
        }else{
            $response['message'] = 'Failed add user data';
            $response['status'] = 500;
        }
        return $response;
    }

    public function read_historyPembayaran($params){
        $query = "SELECT history_pembayaran.*, jenis_paket.*, siswa.*, tunggakan_siswa.*, user.* FROM history_pembayaran inner join tunggakan_siswa on tunggakan_siswa.id_tunggakan = history_pembayaran.id_tunggakan INNER JOIN siswa on tunggakan_siswa.nis = siswa.nis inner join jenis_paket on jenis_paket.id_paket = tunggakan_siswa.id_paket inner join user on user.id_user = siswa.id_user WHERE 1=1";
        $query .= (!$params['id_history_pembayaran'] == 0) ? " && history_pembayaran.id_history_pembayaran = '".$params['id_history_pembayaran']."' " : "";
        $query .= (!$params['id_tunggakan'] == 0) ? " && tunggakan_siswa.id_tunggakan = '".$params['id_tunggakan']."' " : "";
        $query .= (!$params['approved'] == -1) ? " && history_pembayaran.approved = '".$params['approved']."' " : "";
        $query .= (!$params['id_user'] == 0) ? " && user.id_user = '".$params['id_user']."' " : "";
        $query .= (!$params['start_date'] == null || !$params['end_date'] == null) ? " && history_pembayaran.tanggal_transaksi >= '".$params['start_date']."' and history_pembayaran.tanggal_transaksi <= '".$params['end_date']."'" : "";
        $result = $this->db->query($query);

        $response = array();
        if($result->num_rows() > 0){
            $response['message'] = 'Successfully add user data';
            $response['status'] = 200;
            foreach ($result->result() as $row){
                //history pembayaran
                $tempHistoryPembayaran = array();
                $tempHistoryPembayaran['id_history_pembayaran'] = $row->id_history_pembayaran;
                $tempHistoryPembayaran['id_tunggakan'] = $row->id_tunggakan;
                $tempHistoryPembayaran['jumlah_disetorkan'] = $row->jumlah_disetorkan;
                $tempHistoryPembayaran['approved'] = $row->approved;
                $tempHistoryPembayaran['tanggal_transaksi'] = $row->tanggal_transaksi;

                //tunggakan
                $tempTunggakan = array();
                $tempTunggakan['id_tunggakan'] = $row->id_tunggakan;
                $tempTunggakan['nis'] = $row->nis;
                $tempTunggakan['id_paket'] = $row->id_paket;
                $tempTunggakan['tahun_masuk'] = $row->tahun_masuk;
                $tempTunggakan['total_harus_bayar'] = $row->total_harus_bayar;
                $tempTunggakan['baru_dibayarkan'] = $row->baru_dibayarkan;
                //siswa
                $tempSiswa = array();
                $tempSiswa['nis'] = $row->nis;
                $tempSiswa['first_name'] = $row->first_name_siswa;
                $tempSiswa['last_name'] = $row->last_name_siswa;
                $tempSiswa['jenis_kelamin'] = $row->jenis_kelamin_siswa;
                $tempSiswa['tanggal_lahir'] = $row->tanggal_lahir;
                $tempSiswa['tahun_masuk'] = $row->tahun_masuk_siswa;
                $tempSiswa['foto_siswa'] = $row->foto_siswa;
                $tempSiswa['id_user'] = $row->id_user;

                //paket

                $tempPaket = array();
                $tempPaket['id_paket'] = $row->id_paket;
                $tempPaket['desc_paket'] = $row->desc_paket;
                $tempPaket['masa_pembelajaran'] = $row->masa_pembelajaran;

                //user
                $tempUser = array();
                $tempUser['id_user'] = $row->id_user;
                $tempUser['email_user'] = $row->email_user;
                $tempUser['first_name'] = $row->first_name;
                $tempUser['last_name'] = $row->last_name;
                $tempUser['jenis_kelamin'] = $row->jenis_kelamin;
                $tempUser['no_hp'] = $row->no_hp;
                $tempUser['alamat'] = $row->alamat;
                $tempUser['rt'] = $row->rt;
                $tempUser['rw'] = $row->rw;
                $tempUser['foto_profile'] = $row->foto_profile;

                $tempData = [
                    'history_pembayaran' => $tempHistoryPembayaran,
                    'tunggakan_siswa' => $tempTunggakan,
                    'siswa' => $tempSiswa,
                    'paket' => $tempPaket,
                    'user' => $tempUser
                ];

                $response['data'][] = $tempData;
            }
        }else{
            $response['message'] = 'Failed read history pembayaran';
            $response['status'] = 500;
            $response['data'] = null;
        }
        return $response;
    }

    public function update_historyPembayaran($params){
        $update = $this->db->query(
            "UPDATE `history_pembayaran`
             SET
                id_tunggakan = ".$params['id_tunggakan'].",
                jumlah_disetorkan = ".$params['jumlah_disetorkan'].",
                approved = ".$params['approved']."
             WHERE id_history_pembayaran = '".$params['id_history_pembayaran']."'"
        );
        if($update){
            $response['message'] = 'Successfully add user data';
            $response['status'] = 200;
        }else{
            $response['message'] = 'Failed add user data';
            $response['status'] = 500;
        }
        return $response;
    }

    public function delete_historyPembayaran(int $id_paket){
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