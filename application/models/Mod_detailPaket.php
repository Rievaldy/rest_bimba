<?php 

class Mod_detailPaket extends CI_Model{
    public function create_detailPaket($params){
        $data = [
            'id_biaya' => $params['id_biaya'],
            'id_paket' => $params['id_paket']
        ];

        $insert = $this->db->insert('detail_paket',$data);
        $response = array();
        if($insert){
            $response['message'] = 'Successfully add user data';
            $response['status'] = 200;
        }else{
            $response['message'] = 'Failed add user data';
            $response['status'] = 500;
        }
        return $response;
    }

    public function read_detailPaket($params){
        $query = "SELECT list_biaya.* FROM detail_paket INNER JOIN list_biaya ON detail_paket.id_biaya = list_biaya.id_biaya inner join jenis_paket on detail_paket.id_paket = jenis_paket.id_paket WHERE detail_paket.id_paket =" .$params['id_paket']." ORDER BY list_biaya.id_biaya desc";

        $result = $this->db->query($query);

        $response = array();
        if($result->num_rows() > 0){
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($result->result() as $row){
                $tempArray = array();
                $tempArray['id_biaya'] = $row->id_biaya;
                $tempArray['desc_biaya'] = $row->desc_biaya;
                $tempArray['harga'] = $row->harga;
                $tempArray['pembayaran_berkala'] = $row->pembayaran_berkala;
                $response['data'][] = $tempArray;
            }
        }else{
            $response['message'] = 'you dont have user data';
            $response['status'] = 404;
            $response['data'] = null;
        }
        return $response;
    }

    public function update_detailPaket(int $id_biaya, int $id_paket){
        $update = $this->db->query(
            "UPDATE `detail_paket`
             SET
             id_biaya = '$id_biaya',
             id_paket = '$id_paket'
             WHERE id_biaya = '$id_biaya' AND id_paket = '$id_paket'"
        );
        $response = array();
        if($update){
            $response['message'] = 'Successfully add user data';
            $response['status'] = 200;
        }else{
            $response['message'] = 'Failed add user data';
            $response['status'] = 500;
        }
        return $response;
    }

    public function delete_detailPaket($params){
        $delete = $this->db->query("DELETE FROM `detail_paket` WHERE detail_paket.id_biaya = ".$params['id_biaya']." AND detail_paket.id_paket = ".$params['id_paket']);
        $response = array();
        if ($delete) {
            $response['message'] = 'Successfully add user data';
            $response['status'] = 200;
        }else{
            $response['message'] = 'Failed add user data';
            $response['status'] = 500;
        }
        return $response;
    }
}
?>