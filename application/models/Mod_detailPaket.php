<?php 

class Mod_detailPaket extends CI_Model{
    public function create_detailPaket(int $id_biaya, int $id_paket){
        $data = [
            'id_biaya' => $id_biaya,
            'id_paket' => $id_paket
        ];

        $insert = $this->db->insert('detail_paket',$data);
        if ($insert) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully added product data';
            return $response;
         }
         return false;
    }

    public function read_detailPaket(){
        $this->db->order_by('id_paket','DESC');
        $query = $this->db->get('detail_paket');
        if($query->num_rows() > 0){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($query->result() as $row){
                $tempArray = array();
                $tempArray['id_paket'] = $row->id_paket;
                $tempArray['id_biaya'] = $row->id_biaya;
                $response['data'][] = $tempArray;
            }
            return $response;
        }
        return false;
    }

    public function update_detailPaket(int $id_biaya, int $id_paket){
        $update = $this->db->query(
            "UPDATE `detail_paket`
             SET
             id_biaya = '$id_biaya',
             id_paket = '$id_paket'
             WHERE id_biaya = '$id_biaya' AND id_paket = '$id_paket'"
        );
        if($update){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully changed product data';
            return $response;
        }
        return false;
    }

    public function delete_detailPaket(int $id_biaya, int $id_paket){
        $nis = $nis;
        $delete = $this->db->query("DELETE FROM `detail_paket` WHERE id_biaya = '$id_biaya' AND id_paket = '$id_paket'");
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