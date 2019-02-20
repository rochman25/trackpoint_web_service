<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//namespace Restserver\Libraries\;

class TravellerController extends REST_Controller{

  function __construct($config = 'rest'){
    parent::__construct($config);
    $this->load->model('DataModel');
  }

  function data_traveller_get(){
    $id = $this->get('id');
    if($id == ''){
      $traveller = $this->DataModel->get_data('traveller')->result();
    }else{
      $traveller = $this->DataModel->get_dataWhere('traveller','idTraveller',$id)->row();
    }

    if($traveller){
        $this->response($traveller, 200);
    }else{
        $this->response(array('report' => 'Maaf data yang anda cari tidak ada'));
    }
  }

  function input_data_post(){
    $data = array(
              'idTraveller'   => $this->post('id'),
              'username'      => $this->post('username'),
              'email'         => $this->post('email'),
              'nohp'          => $this->post('nohp'),
              'password'      => $this->post('password'),
              'status'        => 'Belum Aktif',
              'foto'          => 'noImage.jpg'
            );
    $insert = $this->DataModel->post_data('traveller',$data);
    $this->response(array('status' => 'berhasil input data',$data, 200));
  }

  function edit_data_put(){
    $id = $this->put('id');
    $data = array(
              'idTraveller'     => $this->put('id'),
              'username'        => $this->put('username'),
              'email'           => $this->put('email'),
              'nohp'            => $this->put('nohp'),
              'password'        => $this->put('password'),
              'status'          => $this->put('status'),
              'foto'            => $this->put('foto')
            );
    $update = $this->DataModel->put_data('traveller',$data,'idTraveller',$id);
    if($update == FALSE){
      $this->response(array('status' => 'data gagal di edit',502));
    }else{
      $this->response(array('status' => 'Data Berhasil di edit',$data, 200));
    }
  }

  function delete_data_delete(){
    $id = $this->delete('id');
    $delete = $this->DataModel->delete_data('traveller','idTraveller',$id);
    if($delete == FALSE){
      $this->response(array('report' => 'Data gagal di hapus', 502));
    }else{
      $this->response(array('report' => 'Data berhasil di hapus'),201);
    }
  }

  function data_checkpoint_get(){
    $checkpoint = $this->DataModel->get_costum_data('traveller','idTraveller,username,checkpoint')->result();
    if($checkpoint){
        $this->response($checkpoint, 200);
    }else{
        $this->response(array('report' => 'Maaf data yang anda cari tidak ada'));
    }
  }

}

?>
