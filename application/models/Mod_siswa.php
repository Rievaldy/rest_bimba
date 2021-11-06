<?php 

class Mod_siswa extends CI_Model{
    public function create_siswa($params){
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
                $response['message'] = 'Failed Upload profile user';
                $response['status'] = 200;
            }else{
                $result = $this->upload->data();
                $path = $result['full_path'];
            }
        }

        $data = [
            'first_name' => $params['first_name'],
            'last_name' => $params['last_name'],
            'jenis_kelamin' => $params['jenis_kelamin'],
            'tanggal_lahir' => $params['tanggal_lahir'],
            'tahun_masuk' => $params['tahun_masuk'],
            'foto_siswa' => $path,
            'id_user' => $params['id_user']
        ];

        $response = array();
        $insert = $this->db->insert('siswa',$data);
        if ($insert) {
            $response['message'] = 'Successfully added siswa data';
            $response['status'] = 200;
         }else{
            $response['message'] = 'Failed added siswa data';
            $response['status'] = 500;
         }
         return $response;
    }

    public function read_siswa($params){

        $query = "SELECT * FROM `siswa` WHERE 1=1";
        $query .= (!$params['nis'] == 0) ? " && nis = '".$params['nis']."' " : "";
        $query .= (!$params['id_user'] == null) ? " && id_user = '".$params['id_user']."' " : "";
        $query .= (!$params['order_by'] == null) ? " order by = '".$params['order_by']."' " : "";
        $query .= (!$params['limit'] == null) ? " limit = '".$params['limit']."' " : "";
        $query .= (!$params['offset'] == null) ? "  offset = '".$params['offset']."' " : "";

        $result = $this->db->query($query);
        $response = array();
        if($query->num_rows() > 0){
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($query->result() as $row){
                $tempArray = array();
                $tempArray['nis'] = $row->nis;
                $tempArray['first_name'] = $row->first_name;
                $tempArray['last_name'] = $row->last_name;
                $tempArray['jenis_kelamin'] = $row->jenis_kelamin;
                $tempArray['tanggal_lahir'] = $row->tanggal_lahir;
                $tempArray['tahun_masuk'] = $row->tahun_masuk;
                $tempArray['foto_siswa'] = $row->foto_siswa;
                $tempArray['id_user'] = $row->id_user;
                $response['data'][] = $tempArray;
            }
        }else{
            $response['message'] = 'Failed added siswa data';
            $response['status'] = 500;
            $response['data'][] = null;
         }
         return $response;
    }

    public function update_siswa($params){
        $update = $this->db->query(
            "UPDATE `siswa`
             SET
                first_name = '".$params['first_name']."',
                last_name = '".$params['last_name']."',
                jenis_kelamin = '".$params['jenis_kelamin']."',
                tanggal_lahir = '".$params['tanggal_lahir']."',
                tahun_masuk = '".$params['tahun_masuk']."',
                foto_siswa = '".$params['foto_siswa']."',
                id_user = '".$params['id_user']."',
             WHERE nis = ".$params['nis']
        );
        if($update){
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully changed product data';
            return $response;
        }
        return false;
    }

    public function delete_siswa(int $nis){
        $nis = $nis;
        $delete = $this->db->query('DELETE FROM `siswa` WHERE nis = '.$nis);
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