<?php
  /**
   *
   */
  require APPPATH . '/libraries/REST_Controller.php';
  class DetailTicketController extends REST_Controller
  {

    function __construct($config = 'rest')
    {
      parent::__construct($config);
      $this->load->model('DataModel');
    }
    public function detail_ticket_get(){

      $id = $this->get('id');
      if($id == ''){
        $detail = $this->DataModel->get_data('detail_tiket')->result();
      }else{
        $detail = $this->DataModel->get_dataWhere('detail_tiket','idTiket',$id)->row();
      }

      if($detail){
          $this->response($detail, 200);
      }else{
          $this->response(array('report' => 'Maaf data yang anda cari tidak ada'));
      }
    }

    public function detail_ticket_byId_get(){
      $id = $this->uri->segment(2);
      //$kategori = $this->get('kategori');
      $detail = $this->DataModel->get_dataWhere('detail_tiket','idTiket',$id)->row();
      if($detail == null){
        $this->response(array("result" => "kosong",200));
      }
      $this->response($detail,200);
    }

    public function detail_ticket_byIdWisata_get(){
      $id = $this->uri->segment(3);
      //$kategori = $this->get('kategori');
      $detail = $this->DataModel->get_dataWhere('detail_tiket','idWisata',$id)->row();
      if($detail == null){
        $this->response(array("result" => "kosong",200));
      }
      $this->response(array("result" => "ada",$detail,200));
    }

    public function input_data_post(){
      $data = array(
                  'idTiket' => $this->post('id'),
                  'idWisata' => $this->post('idWisata'),
                  'ketentuan_tiket' => $this->post('ketentuan'),
                  'tiket_dewasa' => $this->post('dewasa'),
                  'tiket_anak' => $this->post('anak')
              );
      $insert = $this->DataModel->post_data('detail_tiket',$data);
      if($insert == FALSE){
          $this->response(array('status' => 'Gagal input data',$data,500));
      }else{
          $this->response(array('status' => 'berhasil input data',$data, 200));
      }
    }

    public function edit_data_put(){
      $id = $this->put('id');
      $data = array(
                  'idTiket' => $this->put('id'),
                  'idWisata' => $this->put('idWisata'),
                  'ketentuan_tiket' => $this->put('ketentuan'),
                  'tiket_dewasa' => $this->put('dewasa'),
                  'tiket_anak' => $this->put('anak')
              );
      $update = $this->DataModel->put_data('detail_tiket',$data,'idTiket',$id);
      if($update == FALSE){
        $this->response(array('report' => 'data gagal di edit',502));
      }else{
        $this->response(array('report' => 'Data Berhasil di edit',$data, 200));
      }
    }

    function delete_data_delete(){
      $id = $this->delete('id');
      $delete = $this->DataModel->delete_data('detail_tiket','idTiket',$id);
      if($delete == FALSE){
        $this->response(array('report' => 'Data gagal di hapus', 502));
      }else{
        $this->response(array('report' => 'Data berhasil di hapus',201));
      }
    }

    function getDetailTiket_get(){
      $data = $this->db->query("select a.nama_wisata as 'Nama Wisata',b.idTiket as 'Kode Tiket' from wisata a,detail_tiket b where a.idWisata = b.idWisata")->result();
      //var_dump($data);
      $this->response($data);
    }

  }

?>
