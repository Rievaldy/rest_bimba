<?php 

class Mod_siswa extends CI_Model{
    public function create_siswa($params){
        $path = null;
        $config['upload_path']          = './assets/siswa/';
        $config['allowed_types']        = 'jpg|jpeg';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = true;
        $this->load->library('upload',$config);
        if (!empty($_FILES['foto_siswa'])) {
            if(!$this->upload->do_upload('foto_siswa')){
                $response['message'] = 'Failed Upload profile siswa';
                $response['status'] = 500;
            }else{
                $result = $this->upload->data();
                $path = $result['full_path'];
            }
        }

        $data = [
            'first_name_siswa' => $params['first_name'],
            'last_name_siswa' => $params['last_name'],
            'jenis_kelamin_siswa' => $params['jenis_kelamin'],
            'tanggal_lahir' => $params['tanggal_lahir'],
            'tahun_masuk_siswa' => $params['tahun_masuk'],
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
        if($result->num_rows() > 0){
            $response['error'] = false;
            $response['message'] = 'Successfully retrived user data';
            foreach ($result->result() as $row){
                $tempArray = array();
                $tempArray['nis'] = $row->nis;
                $tempArray['first_name'] = $row->first_name_siswa;
                $tempArray['last_name'] = $row->last_name_siswa;
                $tempArray['jenis_kelamin'] = $row->jenis_kelamin_siswa;
                $tempArray['tanggal_lahir'] = $row->tanggal_lahir;
                $tempArray['tahun_masuk'] = $row->tahun_masuk_siswa;
                $tempArray['foto_siswa'] = $row->foto_siswa;
                $tempArray['id_user'] = $row->id_user;
                $response['data'][] = $tempArray;
            }
        }else{
            $response['message'] = 'Failed added siswa data';
            $response['status'] = 500;
            $response['data'] = null;
         }
         return $response;
    }

    public function update_siswa($params){
        $query= "";
        $path = null;
        $config['upload_path']          = './assets/siswa/';
        $config['allowed_types']        = 'jpg|jpeg';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = true;
        $this->load->library('upload',$config);
        if (!empty($_FILES['foto_siswa'])) {
            if(!$this->upload->do_upload('foto_siswa')){
                $this->upload->display_errors();
                $response['message'] = 'Failed Upload profile user';
                $response['status'] = 200;
            }else{
                $result = $this->upload->data();
                $path = $result['full_path'];
                
                
            }
        }
        
        if($path == null){
            $query = "UPDATE `siswa`
             SET
                first_name_siswa = '".$params['first_name']."',
                last_name_siswa = '".$params['last_name']."',
                jenis_kelamin_siswa = '".$params['jenis_kelamin']."',
                tanggal_lahir = '".$params['tanggal_lahir']."',
                tahun_masuk_siswa = '".$params['tahun_masuk']."'
                WHERE nis = ".$params['nis'];
        }else{
            $query = "UPDATE `siswa`
                 SET
                    first_name_siswa = '".$params['first_name']."',
                    last_name_siswa = '".$params['last_name']."',
                    jenis_kelamin_siswa = '".$params['jenis_kelamin']."',
                    tanggal_lahir = '".$params['tanggal_lahir']."',
                    tahun_masuk_siswa = '".$params['tahun_masuk']."',
                    foto_siswa = '".$path."'
                    WHERE nis = '".$params['nis']."'";
        }
        
        $update = $this->db->query($query);
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