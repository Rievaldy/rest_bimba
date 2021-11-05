<?php 

class Mod_tunggakanSiswa extends CI_Model{
    public function create_tunggakanSiswa(int $nis, int $id_paket, int $total_harus_bayar, int $baru_dibayarkan){
        $data = [
            'nis' => $nis,
            'id_paket' => $id_paket,
            'total_harus_bayar' => $total_harus_bayar,
            'baru_dibayarkan' => $baru_dibayarkan
        ];
        $insert = $this->db->insert('tunggakan_siswa',$data);
        if ($insert) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully added product data';
            return $response;
         }
         return false;
    }

    public function read_tunggakanSiswa(){
        $this->db->order_by('id_tunggakan','DESC');
        $query = $this->db->get('tunggakan_siswa');
        if($query->num_rows() > 0){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($query->result() as $row){
                $tempArray = array();
                $tempArray['id_tunggakan'] = $row->id_tunggakan;
                $tempArray['nis'] = $row->nis;
                $tempArray['id_paket'] = $row->id_paket;
                $tempArray['total_harus_bayar'] = $row->total_harus_bayar;
                $tempArray['baru_dibayarkan'] = $row->baru_dibayarkan;
                $response['data'][] = $tempArray;
            }
            return $response;
        }
        return false;
    }

    public function update_tunggakanSiswa(int $id_tunggakan, int $nis, int $id_paket, int $total_harus_bayar, int $baru_dibayarkan){
        $update = $this->db->query(
            "UPDATE `tunggakan_siswa`
             SET
                nis = '$nis',
                id_paket = '$id_paket',
                total_harus_bayar = '$total_harus_bayar',
                baru_dibayarkan = '$baru_dibayarkan'
                foto_profile = '$foto_profile'
             WHERE id_tunggakan = '$id_tunggakan' "
        );
        if($update){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully changed product data';
            return $response;
        }
        return false;
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