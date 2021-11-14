<?php 

class Mod_tunggakanSiswa extends CI_Model{
    public function create_tunggakanSiswa($params){
        $data = [
            'nis' => $params['nis'],
            'id_paket' => $params['id_paket'],
            'tahun_masuk' => $params['tahun_masuk'],
            'total_harus_bayar' => $params['total_harus_bayar'],
            'baru_dibayarkan' => $params['baru_dibayarkan']
        ];

        $insert = $this->db->insert('tunggakan_siswa',$data);
        $response = array();
        if ($insert) {
            $response['error'] = false;
            $response['message'] = 'Successfully added product data';
            return $response;
        }else{
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
        }
        return $response;
    }

    public function read_tunggakanSiswa($params){
        $query = "SELECT tunggakan_siswa.*, siswa.*, user.*, jenis_paket.* FROM tunggakan_siswa inner join siswa on siswa.nis = tunggakan_siswa.nis inner join user on user.id_user = siswa.id_user inner join jenis_paket on jenis_paket.id_paket = tunggakan_siswa.id_paket WHERE 1=1";
        $query .= (!$params['id_tunggakan'] == 0) ? " && tunggakan_siswa.id_tunggakan = '".$params['id_tunggakan']."' " : "";
        $query .= (!$params['nis'] == 0) ? " && tunggakan_siswa.nis = '".$params['nis']."' " : "";
        $query .= (!$params['id_paket'] == 0) ? " && tunggakan_siswa.id_paket = '".$params['id_paket']."' " : "";
        $query .= (!$params['id_user'] == 0) ? " && user.id_user = '".$params['id_user']."' " : "";
        $query .= (!$params['tahun_masuk'] == null) ? " && tunggakan_siswa.tahun_masuk = '".$params['tahun_masuk']."' " : "";
        $result = $this->db->query($query);
        $response = array();
        if($result->num_rows() > 0){
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($result->result() as $row){
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
                $tempSiswa['jenis_kelamin'] = $row->jenis_kelamin;
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
                    'tunggakan_siswa' => $tempTunggakan,
                    'siswa' => $tempSiswa,
                    'paket' => $tempPaket,
                    'user' => $tempUser
                ];

                $response['data'][] = $tempData;
            }
        }else{
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
        }
        return $response;
    }

    public function update_tunggakanSiswa($params){
        $update = $this->db->query(
            "UPDATE `tunggakan_siswa`
            SET
                nis = ".$params['nis'].",
                id_paket = ".$params['id_paket'].",
                total_harus_bayar = ".$params['total_harus_bayar'].",
                baru_dibayarkan = ".$params['baru_dibayarkan'].",
                tahun_masuk = ".$params['tahun_masuk']."
            WHERE id_tunggakan = ".$params['id_tunggakan']
        );
        if ($update) {
            $response['error'] = false;
            $response['message'] = 'Successfully added product data';
            return $response;
        }else{
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
        }
        return $response;
    }

    public function delete_tunggakanSiswa(int $id_tunggakan){
        $id_tunggakan = $id_tunggakan;
        $delete = $this->db->query('DELETE FROM `tunggakan_siswa` WHERE id_tunggakan = '.$id_tunggakan);
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