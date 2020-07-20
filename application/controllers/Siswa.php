<?php

require APPPATH . 'libraries/REST_Controller.php';

class Siswa extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('SiswaM');
      }

      public function add_post(){
        $response = $this->SiswaM->insert(
            $this->post('name'),
            $this->post('gender'),
            2
          );
        $this->response($response);
      }

      public function all_siswa_get(){
        $response = $this->SiswaM->select_all();
        $this->response($response);
      }

      public function update_post(){
        $response = $this->SiswaM->update(
          $this->post('id'),
          $this->post('name'),
          $this->post('gender'),
          $this->post('jurusan_id')
        );
      $this->response($response);
      }

      public function delete_post(){
        $response = $this->SiswaM->delete(
          $this->post('id'),
        );
      $this->response($response);
      }

      public function chart_get(){
        $men = $this->SiswaM->total_rows_men();
        $women = $this->SiswaM->total_rows_women();
        $response['success'] = true;
        $response['message'] = 'Berhasil';
        $response['men'] = $men;
        $response['women'] = $women;
        $this->response($response);
      }
}