<?php

require APPPATH . '/libraries/REST_Controller.php';

    class WisataController extends REST_Controller{

      function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('DataModel');
      }

      public function data_wisata_get(){
        $id = $this->get('id');
        if($id == ''){
          $traveller = $this->DataModel->get_data('wisata')->result_array();
        }else{
          $traveller = $this->DataModel->get_dataWhere('wisata','idWisata',$id)->row();
        }
        $this->response($traveller,REST_Controller::HTTP_OK);
      }

      public function data_wisata_pengelola_get($id){
          $wisata = $this->DataModel->get_dataWhere('wisata','idpengelola',$id)->result();
          $this->response($wisata,200);
      }

      public function data_ByAdmin_get(){
        $wisata = $this->DataModel->get_join('wisata','idWisata,nama_wisata,kategori,pengelola.nama_lengkap,status,','wisata.idpengelola = pengelola.idpengelola','pengelola')->result();
        $this->response($wisata,200);

      }

      public function data_ByKategori_get(){
        $kategori = $this->uri->segment(3);
        //$kategori = $this->get('kategori');
        $wisata = $this->DataModel->get_dataWhere('wisata','kategori',$kategori)->result();
        if($wisata == null){
          $this->response(array("result" => "kosong",200));
        }
        $this->response($wisata,200);
      }

      public function data_ByRecommend_get(){
        $wisata = $this->DataModel->get_dataWhere_orderBy('wisata','rating','desc')->result();
        $this->response($wisata,200);
      }

      public function data_ByDistance_get(){
        //still progress hehe
      }

      public function data_slider_get(){
        $data1 = $this->DataModel->get_dataWhereCustom('wisata','foto','kategori','Pantai')->row();
        $data2 = $this->DataModel->get_dataWhereCustom('wisata','foto','kategori','Bukit')->row();
        $data3 = array($data1,$data2);
        $this->response($data3,200);
        //$this->response($data2,200);
      }

      public function input_data_post(){
        $data = array(
                  'idWisata' => $this->post('id'),
                  'nama_wisata' => $this->post('nama'),
                  'alamat_wisata' => $this->post('alamat'),
                  'deskripsi' => $this->post('deskripsi'),
                  'kategori' => $this->post('kategori'),
                  'status' => $this->post('status'),
                  'foto' => $this->post('foto'),
                  'rating' => $this->post('rating'),
                  'longitude' => $this->post('latitude'),
                  'latitude' => $this->post('longitude'),
                  'idPengelola' => $this->post('idPengelola'),
                );
          $insert = $this->DataModel->post_data('wisata',$data);

          if($insert == FALSE){
            $this->response(array('status' => 'Gagal input data',$data,500));
          }else{
            $this->response(array('status' => 'berhasil input data',$data, 200));
          }

      }

      public function edit_data_put(){
        $id = $this->put('id');
        $data = array(
                  'idWisata' => $this->put('id'),
                  'nama_wisata' => $this->put('nama'),
                  'alamat_wisata' => $this->put('alamat'),
                  'deskripsi' => $this->put('deskripsi'),
                  'kategori' => $this->put('kategori'),
                  'status' => $this->put('status'),
                  'foto' => $this->put('foto'),
                  'rating' => $this->put('rating'),
                  'latitude' => $this->put('latitude'),
                  'longitude' => $this->put('longitude'),
                  'idPengelola' => $this->put('idPengelola')
                );
          $update = $this->DataModel->put_data('wisata',$data,'idWisata',$id);
          if($update == FALSE){
            $this->response(array('report' => 'data gagal di edit',502));
          }else{
            $this->response(array('report' => 'Data Berhasil di edit',$data, 200));
          }
      }

      public function delete_data_delete(){
        $id = $this->delete('id');
        $deleteWisata = $this->DataModel->delete_data('wisata','idWisata',$id);
        if($deleteWisata == FALSE){
          $this->response(array('report' => 'Data gagal di hapus', 502));
        }else{
          $this->response(array('report' => 'Data berhasil di hapus',201));
        }
      }
    }
?>
