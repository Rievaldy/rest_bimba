<?php 

class Mod_jenisPaket extends CI_Model{
    public function create_jenisPaket($params){

        $data = [
            'desc_paket' => $params['desc_paket'],
            'masa_pembelajaran' => $params['masa_pembelajaran']
        ];

        $insert = $this->db->insert('jenis_paket',$data);
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

    public function read_jenisPaket($params){
        $query = "SELECT * FROM `jenis_paket` WHERE 1=1";
        $query .= (!$params['id_paket'] == 0) ? " && id_paket = '".$params['id_paket']."' " : "";
        $query .= (!$params['order_by'] == null) ? " order by = ".$params['order_by'] : "";
        $query .= (!$params['limit'] == null) ? " limit = '".$params['limit']."' " : "";
        $query .= (!$params['offset'] == null) ? "  offset = '".$params['offset']."' " : "";

        $result = $this->db->query($query);

        $response = array();
        if($result->num_rows() > 0){
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($result->result() as $row){
                $tempArray = array();
                $tempArray['id_paket'] = $row->id_paket;
                $tempArray['desc_paket'] = $row->desc_paket;
                $tempArray['masa_pembelajaran'] = $row->masa_pembelajaran;
                $response['data'][] = $tempArray;
            }
        }else{
            $response['message'] = 'you dont have user data';
            $response['status'] = 404;
            $response['data'] = null;
        }
        return $response;
    }

    public function update_jenisPaket($params){
        $update = $this->db->query(
            "UPDATE `jenis_paket`
             SET
                desc_paket = '".$params['desc_paket']."',
                masa_pembelajaran = ".$params['masa_pembelajaran']."
             WHERE id_paket = ".$params['id_paket']
        );
        $response = array();
        if($update){
            $response['error'] = false;
            $response['message'] = 'Successfully changed product data';
        }else{
            $response['message'] = 'you dont have user data';
            $response['status'] = 404;
            $response['data'] = null;
        }
        return $response;
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