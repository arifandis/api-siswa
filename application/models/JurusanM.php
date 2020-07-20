<?php

class JurusanM extends CI_Model{

    public function insert($name){

        $data = array(
            "id"=>null,
            "jurusan"=>$name,
          );

          $insert = $this->db->insert("tb_jurusan", $data);
          if($insert){
            $response['success']=true;
            $response['message']='Berhasil menambahkan jurusan baru';

            return $response;
          }else{
            $response['success']=false;
            $response['message']='Gagal menambahkan jurusan baru';

            return $response;
          }
    }

    public function select_all(){
        $this->db->order_by('jurusan','ASC');
        $all = $this->db->get("tb_jurusan")->result();
        $response['success']=true;
        $response['message']="";
        $response['jurusans']=$all;
        return $response;
    }

    public function update($id,$name){

        $where = array(
            "id"=>$id
          );

          $data = array(
            "jurusan"=>$name,
          );

          $this->db->where($where);
          $update = $this->db->update("tb_jurusan", $data);

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
          $this->db->delete('tb_jurusan');
          $response['success']=true;
          $response['message']='Berhasil menghapus data';

          return $response;
    }
}