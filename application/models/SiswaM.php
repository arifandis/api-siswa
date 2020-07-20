<?php

class SiswaM extends CI_Model{

    public function insert($name,$gender,$jurusan){

        $data = array(
            "id"=>null,
            "nama"=>$name,
            "jenis_kelamin"=>$gender,
            "jurusan_id"=>$jurusan
          );

          $insert = $this->db->insert("tb_siswa", $data);
          if($insert){
            $response['success']=true;
            $response['message']='Berhasil menambahkan siswa';

            return $response;
          }else{
            $response['success']=false;
            $response['message']='Gagal menambahkan siswa';

            return $response;
          }
    }

    public function select_all(){
        $this->db->order_by('nama','ASC');
        $all = $this->db->get("tb_siswa")->result();
        $response['success']=true;
        $response['message']="";
        $response['siswas']=$all;
        return $response;
    }

    public function update($id,$name,$gender,$jurusan){

        $where = array(
            "id"=>$id
          );

          $data = array(
            "nama"=>$name,
            "jenis_kelamin"=>$gender,
            "jurusan_id"=>$jurusan
          );

          $this->db->where($where);
          $update = $this->db->update("tb_siswa", $data);

          if($update){
            $response['success']=true;
            $response['message']='Berhasil mengubah data';

            return $response;
        }else{
            $response['success']=false;
            $response['message']='Gagal mengubah data';

            return $response;
        }
    }

    public function delete($id){
        $where = array(
            "id"=>$id
          );

          $this->db->where($where);
          $this->db->delete('tb_siswa');
          $response['success']=true;
          $response['message']='Berhasil menghapus data';

          return $response;
    }

    public function total_rows_men() {
      $where = array(
        "jenis_kelamin"=>'Laki-laki'
      );
      $this->db->where($where);
      $data = $this->db->get('tb_siswa');
  
      return $data->num_rows();
      }

      public function total_rows_women() {
        $where = array(
          "jenis_kelamin"=>'Perempuan'
        );
        $this->db->where($where);
        $data = $this->db->get('tb_siswa');
    
        return $data->num_rows();
        }
}