<?php

require APPPATH . 'libraries/REST_Controller.php';

class Jurusan extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('JurusanM');
      }

      public function add_post(){
        $response = $this->JurusanM->insert(
            $this->post('jurusan'),
          );
        $this->response($response);
      }

      public function all_jurusan_get(){
        $response = $this->JurusanM->select_all();
        $this->response($response);
      }

      public function update_post(){
        $response = $this->JurusanM->update(
          $this->post('id'),
          $this->post('name'),
        );
      $this->response($response);
      }

      public function delete_post(){
        $response = $this->JurusanM->delete(
          $this->post('id'),
        );
      $this->response($response);
      }
}