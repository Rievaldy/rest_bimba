<?php 

class Mod_userAccess extends CI_Model{
    public function create_userAccess($params){
        $data = [
            'email_user' => $params['email_user'],
            'password_user' => md5($params['password_user']),
            'id_level' => $params['id_level'],
        ];
        $insert = $this->db->insert('user_access',$data);
        if ($insert) {
            $response = array();
            $response['message'] = 'Successfully added user access';
            $response['status'] = 200;
            
         }else{
            $response = array();
            $response['message'] = 'Failed added user access';
            $response['status'] = 500;
         }
         return $response;;
    }

    public function read_userAccess($params){

        $query = "SELECT * FROM `user_access` WHERE 1=1 ";
        $query .= (!$params['id_level'] == 0) ? " && id_level = '".$params['id_level']."' " : "";
        $query .= (!$params['email_user'] == null) ? " && email_user = '".$params['email_user']."' " : "";
        $query .= (!$params['email_user'] == null && !$params['password_user'] == null) ? " && password_user = '".md5($params['password_user'])."' " : "";
        $query .= (!$params['order_by'] == null) ? " order by email_user '".$params['order_by']."' " : "";
        $query .= (!$params['limit'] == null) ? " limit ".$params['limit']." " : "";
        $query .= (!$params['offset'] == null) ? " offset ".$params['offset']." " : "";
        
        $result = $this->db->query($query);
        if($result->num_rows() > 0){
            $response = array();
            $response['message'] = 'Successfully retrived user access';
            $response['status'] = 200;
            foreach ($result->result() as $row){
                $tempArray = array();
                $tempArray['email_user'] = $row->email_user;
                $tempArray['password_user'] = $row->password_user;
                $tempArray['id_level'] = $row->id_level;
                $response['data'][] = $tempArray;
            }
        }else{
            $response = array();
            $response['message'] = 'Failed retrived user access';
            $response['status'] = 404;
            $response['data'] = null;
        }
        return $response;
    }

    public function update_userAccess($params){
        $update = $this->db->query(
            "UPDATE `user_access`
             SET
                password_user = '".md5($params['password_user'])."',
                id_level = ".$params['id_level']."
             WHERE email_user = '".$params['email_user']."'"
        );
        if ($update) {
            $response = array();
            $response['message'] = 'Successfully update user access';
            $response['status'] = 200;
            
         }else{
            $response = array();
            $response['message'] = 'Failed update user access';
            $response['status'] = 500;
         }
         return $response;
    }

    public function delete_userLevel(String $email_user){
        $email_user = $email_user;
        $delete = $this->db->query('DELETE FROM `user_access` WHERE email_user = '.$email_user);
        if ($delete) {
            $response = array();
            $response['message'] = 'Successfully delete user access';
            $response['status'] = 200;
            
         }else{
            $response = array();
            $response['message'] = 'Failed delete user access';
            $response['status'] = 500;
         }
         return $response;
    }
}
?>