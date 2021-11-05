<?php 

class Mod_listBiaya extends CI_Model{
    public function create_listBiaya(String $desc_biaya, String $harga){
        $data = [
            'desc_biaya' => $desc_biaya,
            'harga' => $harga
        ];

        $insert = $this->db->insert('list_biaya',$data);
        if ($insert) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully added product data';
            return $response;
         }
         return false;
    }

    public function read_listBiaya(){
        $this->db->order_by('id_biaya','DESC');
        $query = $this->db->get('list_biaya');
        if($query->num_rows() > 0){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($query->result() as $row){
                $tempArray = array();
                $tempArray['nis'] = $row->nis;
                $tempArray['desc_biaya'] = $row->desc_biaya;
                $tempArray['harga'] = $row->harga;
                $response['data'][] = $tempArray;
            }
            return $response;
        }
        return false;
    }

    public function update_listBiaya(int $id_biaya, String $desc_biaya, String $harga){
        $update = $this->db->query(
            "UPDATE `list_biaya`
             SET
                desc_biaya = '$desc_biaya',
                harga = '$harga'
             WHERE id_biaya = '$id_biaya' "
        );
        if($update){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully changed product data';
            return $response;
        }
        return false;
    }

    public function delete_listBiaya(int $id_biaya){
        $nis = $nis;
        $delete = $this->db->query('DELETE FROM `list_biaya` WHERE id_biaya = '.$id_biaya);
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