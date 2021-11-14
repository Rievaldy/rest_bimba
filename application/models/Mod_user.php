<?php 

class Mod_user extends CI_Model{
    public function create_user($params){

        $path = null;
        $config['upload_path']          = './assets/user/';
        $config['allowed_types']        = 'jpg|jpeg';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = true;
        $this->load->library('upload',$config);
        if (!empty($_FILES['foto_profile'])) {
            if(!$this->upload->do_upload('foto_profile')){
                $this->upload->display_errors();
                $response['message'] = 'Failed Upload profile user';
                $response['status'] = 200;
            }else{
                $result = $this->upload->data();
                $path = $result['full_path'];
            }
        }
        

        $data = [
            'email_user' => $params['email_user'],
            'first_name' => $params['first_name'],
            'last_name' => $params['last_name'],
            'jenis_kelamin' => $params['jenis_kelamin'],
            'no_hp' => $params['no_hp'],
            'alamat' => $params['alamat'],
            'rt' => $params['rt'],
            'rw' => $params['rw'],
            'foto_profile' => $path
        ];

        $insert = $this->db->insert('user',$data);
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

    public function read_user($params){
        $query = "SELECT * FROM `user` WHERE 1=1";
        $query .= (!$params['id_user'] == 0) ? " && id_user = '".$params['id_user']."' " : "";
        $query .= (!$params['email_user'] == null) ? " && email_user = '".$params['email_user']."' " : "";
        $query .= (!$params['order_by'] == null) ? " order by = '".$params['order_by']."' " : "";
        $query .= (!$params['limit'] == null) ? " limit = '".$params['limit']."' " : "";
        $query .= (!$params['offset'] == null) ? "  offset = '".$params['offset']."' " : "";

        $result = $this->db->query($query);
        if($result->num_rows() > 0){
            $response = array();
            $response['message'] ='Successfully retrived user data';
            $response['status'] =  200;
            foreach ($result->result() as $row){
                $tempArray = array();
                $tempArray['id_user'] = $row->id_user;
                $tempArray['email_user'] = $row->email_user;
                $tempArray['first_name'] = $row->first_name;
                $tempArray['last_name'] = $row->last_name;
                $tempArray['jenis_kelamin'] = $row->jenis_kelamin;
                $tempArray['no_hp'] = $row->no_hp;
                $tempArray['alamat'] = $row->alamat;
                $tempArray['rt'] = $row->rt;
                $tempArray['rw'] = $row->rw;
                $tempArray['foto_profile'] = $row->foto_profile;
                $response['data'][] = $tempArray;
            }
        }else{
                $response['message'] = 'you dont have user data';
                $response['status'] = 404;
                $response['data'] = null;
        }
        return $response;
    }

    public function update_user($params){
        $query= "";
        $path = null;
        $config['upload_path']          = './assets/user/';
        $config['allowed_types']        = 'jpg|jpeg';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = true;
        $this->load->library('upload',$config);
        if (!empty($_FILES['foto_profile'])) {
            if(!$this->upload->do_upload('foto_profile')){
                $this->upload->display_errors();
                $response['message'] = 'Failed Upload profile user';
                $response['status'] = 200;
            }else{
                $result = $this->upload->data();
                $path = $result['full_path'];
                
                
            }
        }
        
        if($path == null){
            $query = "UPDATE `user`
             SET
                first_name = '".$params['first_name']."',
                last_name = '".$params['last_name']."',
                jenis_kelamin = '".$params['jenis_kelamin']."',
                no_hp = '".$params['no_hp']."',
                alamat = '".$params['alamat']."',
                rt = '".$params['rt']."',
                rw = '".$params['rw']."'
                WHERE id_user = ".$params['id_user'];
        }else{
            $query = "UPDATE `user`
                 SET
                    first_name = '".$params['first_name']."',
                    last_name = '".$params['last_name']."',
                    jenis_kelamin = '".$params['jenis_kelamin']."',
                    no_hp = '".$params['no_hp']."',
                    alamat = '".$params['alamat']."',
                    rt = '".$params['rt']."',
                    rw = '".$params['rw']."',
                    foto_profile = '".$path."'
                    WHERE id_user = '".$params['id_user']."'";
        }
        
        $update = $this->db->query($query);
        $response = array();
        if($update){
            $response['message'] = 'Successfully changed user data';
            $response['status'] = 200;
        }else{
            
            $response['message'] = 'Failed changed user data';
            $response['status'] = 500;
        }
        return $response;
    }

    public function delete_user(int $id_user){
        $id_user = $id_user;
        $delete = $this->db->query('DELETE FROM `user` WHERE id_user = '.$id_user);
        $response = array();
        if($delete){
            $response['message'] = 'Successfully delete user data';
            $response['status'] = 200;
        }else{
            
            $response['message'] = 'Failed delete user data';
            $response['status'] = 500;
        }
        return $response;
    }
}

?>