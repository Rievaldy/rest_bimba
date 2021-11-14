<?php 

class Mod_listBiaya extends CI_Model{
    public function create_listBiaya($params){
        $data = [
            'desc_biaya' => $params['desc_biaya'],
            'harga' => $params['harga'],
            'pembayaran_berkala' => $params['pembayaran_berkala']
        ];

        $insert = $this->db->insert('list_biaya',$data);
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

    public function read_listBiaya($params){

        $query = "SELECT * FROM `list_biaya` WHERE 1=1";
        $query .= (!$params['id_biaya'] == 0) ? " && id_biaya = '".$params['id_biaya']."' " : "";
        $query .= (!$params['order_by'] == null) ? " order by ".$params['order_by'] : "";
        $query .= (!$params['limit'] == null) ? " limit = '".$params['limit']."' " : "";
        $query .= (!$params['offset'] == null) ? "  offset = '".$params['offset']."' " : "";

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

    public function update_listBiaya($params){
        $update = $this->db->query(
            "UPDATE `list_biaya`
             SET
                desc_biaya = '".$params['desc_biaya']."',
                harga = ".$params['harga'].",
                pembayaran_berkala = ".$params['pembayaran_berkala']."
             WHERE id_biaya = ".$params['id_biaya']
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

    public function delete_listBiaya(int $id_biaya){
        $nis = $nis;
        $delete = $this->db->query('DELETE FROM `list_biaya` WHERE id_biaya = '.$id_biaya);
        $response = array();
        if ($delete) {
            $response['error'] = false;
            $response['message'] = 'Successfully deleted product data';
        }else{
            $response['message'] = 'you dont have user data';
            $response['status'] = 404;
            $response['data'] = null;
        }
        return $response;
    }
}
?>