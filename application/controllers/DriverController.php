<?php
  /**
   *
   */
require APPPATH . '/libraries/REST_Controller.php';
  class DriverController extends REST_Controller
  {

    function __construct($config = 'rest')
    {
      parent::__construct($config);
      $this->load->model('DataModel');
    }

    public function data_driver_get(){
      $id = $this->get('id');
      if($id == ''){
        $response = $this->DataModel->get_data('driver')->result();
      }else{
        $response = $this->DataModel->get_dataWhere('driver','idDriver',$id)->row();
      }

      if($response){
          $this->response($response, 200);
      }else{
          $this->response(array('report' => 'Maaf data yang anda cari tidak ada'));
      }
    }

    public function input_data_post(){
      $data = array(
                'idDriver' => $this->post('id'),
                'username' => $this->post('username'),
                'nama_lengkap' => $this->post('nama'),
                'alamat' => $this->post('alamat'),
                'email' => $this->post('email'),
                'nohp' => $this->post('nohp'),
                'password' => $this->post('password'),
              );
              $insert = $this->DataModel->post_data('driver',$data);
              if($insert == FALSE){
                $this->response(array('report' => 'Data gagal dimasukkan',502));
              }else{
                $this->response(array('report' => 'Data berhasil dimasukkan',$data,200));
              }
    }

    public function edit_data_put(){
      $id = $this->put('id');
      $data = array(
                'idDriver' => $this->put('id'),
                'username' => $this->put('username'),
                'nama_lengkap' => $this->put('nama'),
                'alamat' => $this->put('alamat'),
                'email' => $this->put('email'),
                'nohp' => $this->put('nohp'),
                'password' => $this->put('password'),
              );
      $update = $this->DataModel->put_data('driver',$data,'idDriver',$id);
      if($update == FALSE){
        $this->response(array('report' => 'data gagal di edit',502));
      }else{
        $this->response(array('report' => 'Data Berhasil di edit',$data, 200));
      }
    }

    public function delete_data_delete(){
      $id = $this->delete('id');
      $delete = $this->DataModel->delete_data('driver','idDriver',$id);
      if($delete == FALSE){
        $this->response(array('report' => 'Data gagal di hapus', 502));
      }else{
        $this->response(array('report' => 'Data berhasil di hapus',$data,201));
      }
    }

  }

 ?>
