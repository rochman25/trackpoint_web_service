<?php
  /**
   *
   */
require APPPATH . '/libraries/REST_Controller.php';
  class ResponseController extends REST_Controller
  {

    function __construct($config = 'rest')
    {
      parent::__construct($config);
      $this->load->model('DataModel');
    }

    public function data_response_get(){
      $id = $this->get('id');
      if($id == ''){
        $response = $this->DataModel->get_data('responsefeedback')->result();
      }else{
        $response = $this->DataModel->get_dataWhere('responsefeedback','idresponse',$id)->result();
      }

      if($response){
          $this->response($response, 200);
      }else{
          $this->response(array('report' => 'Maaf data yang anda cari tidak ada'));
      }
    }

    public function input_data_post(){
      $data = array(
                'idresponse' => $this->post('id'),
                'idfeedback' => $this->post('idfeedback'),
                'idpengelola' => $this->post('idpengelola'),
                'response' => $this->post('response'),
                'created_at' => $this->post('in'),
                'updated_at' => $this->post('up')
              );
      $insert = $this->DataModel->post_data('responsefeedback',$data);
      if($insert == FALSE){
        $this->response(array('report' => 'Data gagal dimasukkan',502));
      }else{
        $this->response(array('report' => 'Data berhasil dimasukkan',$data,200));
      }
    }

    public function edit_data_put(){
      $id = $this->put('id');
      $data = array(
                  'idresponse' => $this->put('id'),
                  'idfeedback' => $this->put('idfeedback'),
                  'idpengelola' => $this->put('idpengelola'),
                  'response' => $this->put('response'),
                  'created_at' => $this->put('in'),
                  'updated_at' => $this->put('up')
              );
      $update = $this->DataModel->put_data('responsefeedback',$data,'idfeedback',$id);
      if($update == FALSE){
        $this->response(array('report' => 'data gagal di edit',502));
      }else{
        $this->response(array('report' => 'Data Berhasil di edit',$data, 200));
      }
    }

    public function delete_data_delete(){
      $id = $this->delete('id');
      $delete = $this->DataModel->delete_data('responsefeedback','idresponse',$id);
      if($delete == FALSE){
        $this->response(array('report' => 'Data gagal di hapus', 502));
      }else{
        $this->response(array('report' => 'Data berhasil di hapus',$data,201));
      }
    }

  }


 ?>
