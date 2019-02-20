<?php
    /**
     *
     */
     require APPPATH . '/libraries/REST_Controller.php';
    class FeedbackController extends REST_Controller
    {

      function __construct($config = 'rest')
      {
        parent::__construct($config);
        $this->load->model('DataModel');
      }

      public function data_feedback_get(){
        $id = $this->get('id');
        if($id == ''){
          $feedback = $this->DataModel->get_data('feedback')->result();
        }else{
          $feedback = $this->DataModel->get_dataWhere('feedback','idFeedback',$id)->result();
        }

        if($feedback){
            $this->response($feedback, 200);
        }else{
            $this->response(array('report' => 'Maaf data yang anda cari tidak ada'));
        }
      }

      public function data_feedback_wisata_get($id){
        $feedback = $this->DataModel->get_dataWhere('feedback','idWisata',$id)->result();
        if($feedback == null){
          $this->response(array('status' => 'belum ada data',404));
        }else{
          $this->response(array('status' => 'ada data',$feedback,200));
        }
      }

      public function input_data_post(){
        $data = array(
                  'idFeedback' => $this->post('id'),
                  'idWisata' => $this->post('idWisata'),
                  'feedback' => $this->post('feedback'),
                  'created_at' => $this->post('in'),
                  'updated_at' => $this->post('up'),
                  'idTraveller' => $this->post('idTraveller')
                );
        $insert = $this->DataModel->post_data('feedback',$data);
        if($insert == FALSE){
          $this->response(array('report' => 'Data gagal dimasukkan',502));
        }else{
          $this->response(array('report' => 'Data berhasil dimasukkan',$data,200));
        }
      }

      public function edit_data_put(){
          $id = $this->put('id');
          $data = array(
                    'idFeedback' => $this->put('id'),
                    'idWisata' => $this->put('idWisata'),
                    'feedback' => $this->put('feedback'),
                    'created_at' => $this->put('in'),
                    'updated_at' => $this->put('up'),
                    'idTraveller' => $this->put('idTraveller')
                  );
          $update = $this->DataModel->put_data('feedback',$data,'idFeedback',$id);
          if($update == FALSE){
            $this->response(array('report' => 'data gagal di edit',502));
          }else{
            $this->response(array('report' => 'Data Berhasil di edit',$data, 200));
          }
      }

      public function delete_data_delete(){
          $id = $this->delete('id');
          $delete = $this->DataModel->delete_data('feedback','idFeedback',$id);
          if($delete == FALSE){
            $this->response(array('report' => 'Data gagal di hapus', 502));
          }else{
            $this->response(array('report' => 'Data berhasil di hapus',$data,201));
          }
      }

    }



 ?>
