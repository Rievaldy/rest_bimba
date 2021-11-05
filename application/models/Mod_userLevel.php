<?php 

class Mod_userLevel extends CI_Model{
    public function create_userLevel(String $desc_level){
        $data = [
            'desc_level' => $desc_level
        ];
        $insert = $this->db->insert('user_level',$data);
        if ($insert) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully added product data';
            return $response;
         }
         return false;
    }

    public function read_userLevel(){
        $this->db->order_by('id_level','DESC');
        $query = $this->db->get('user_level');
        if($query->num_rows() > 0){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($query->result() as $row){
                $tempArray = array();
                $tempArray['id_level'] = $row->id_level;
                $tempArray['desc_level'] = $row->desc_level;
                $response['data'][] = $tempArray;
            }
            return $response;
        }
        return false;
    }

    public function update_userLevel(int $id_level, string $desc_level){
        $update = $this->db->query(
            "UPDATE `user_level`
             SET
                desc_level = '$desc_level'
             WHERE id_level = '$id_level' "
        );
        if($update){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully changed product data';
            return $response;
        }
        return false;
    }

    public function delete_userLevel(int $id_level){
        $id_level = $id_level;
        $delete = $this->db->query('DELETE FROM `user_level` WHERE id_level = '.$id_level);
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