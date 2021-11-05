<?php 

class Mod_jenisPaket extends CI_Model{
    public function create_jenisPaket(String $desc_paket, int $masa_pembelajaran){
        $data = [
            'desc_paket' => $desc_paket,
            'masa_pembelajaran' => $masa_pembelajaran
        ];

        $insert = $this->db->insert('jenis_paket',$data);
        if ($insert) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully added product data';
            return $response;
         }
         return false;
    }

    public function read_jenisPaket(){
        $this->db->order_by('id_paket','DESC');
        $query = $this->db->get('jenis_paket');
        if($query->num_rows() > 0){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($query->result() as $row){
                $tempArray = array();
                $tempArray['id_paket'] = $row->id_paket;
                $tempArray['desc_paket'] = $row->masa_pembelajaran;
                $tempArray['masa_pembelajaran'] = $row->masa_pembelajaran;
                $response['data'][] = $tempArray;
            }
            return $response;
        }
        return false;
    }

    public function update_jenisPaket(int $id_paket, String $desc_paket, String $masa_pembelajaran){
        $update = $this->db->query(
            "UPDATE `jenis_paket`
             SET
                desc_paket = '$desc_paket',
                masa_pembelajaran = '$masa_pembelajaran'
             WHERE id_paket = '$id_paket' "
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
        $delete = $this->db->query('DELETE FROM `jenis_paket` WHERE id_paket = '.$id_paket);
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