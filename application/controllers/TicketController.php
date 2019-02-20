<?php
  /**
   *
   */
require APPPATH . '/libraries/REST_Controller.php';
  class TicketController extends REST_Controller
  {

    function __construct($config = 'rest')
    {
      parent::__construct($config);
      $this->load->model('DataModel');
    }

    public function data_ticket_get(){
      $id = $this->get('id');
      if($id == ''){
        $response = $this->DataModel->get_data('tickettransaction')->result();
      }else{
        $response = $this->DataModel->get_dataWhere('tickettransaction','idTransaksi',$id)->result();
      }

      if($response){
          $this->response($response, 200);
      }else{
          $this->response(array('report' => 'Maaf data yang anda cari tidak ada'));
      }
    }

    public function input_data_post(){
      $data = array(
                'idTransaksi' => $this->post('id'),
                'idTraveller' => $this->post('idTraveller'),
                'idTiket' => $this->post('idTiket'),
                'jumlah_tiketAnak' => $this->post('jumlahTA'),
                'jumlah_tiketDewasa' => $this->post('jumlahTD'),
                'total_harga' => $this->post('total'),
                'status' => $this->post('status'),
                'tanggal_transaksi' => $this->post('tglTransaksi'),
                'tanggal_bayar' => $this->post('tglBayar')
              );
              $insert = $this->DataModel->post_data('tickettransaction',$data);
              if($insert == FALSE){
                $this->response(array('status' => 'Data gagal dimasukkan',502));
              }else{
                $this->response(array('status' => 'Data berhasil dimasukkan',$data,200));
              }
    }

    public function edit_data_put(){
      $id = $this->put('id');
      $data = array(
                'idTransaksi' => $this->put('id'),
                'idTraveller' => $this->put('idTraveller'),
                'idWisata' => $this->put('idWisata'),
                'jumlah_tiketAnak' => $this->post('jumlahTA'),
                'jumlah_tiketDewasa' => $this->post('jumlahTD'),
                'total_harga' => $this->put('total'),
                'status' => $this->put('status'),
                'tanggal_transaksi' => $this->put('tglTransaksi'),
                'tanggal_bayar' => $this->put('tglBayar')
              );
              $update = $this->DataModel->put_data('tickettransaction',$data,'idTransaksi',$id);
              if($update == FALSE){
                $this->response(array('report' => 'data gagal di edit',502));
              }else{
                $this->response(array('report' => 'Data Berhasil di edit',$data, 200));
              }
    }

    public function delete_data_delete(){
      $id = $this->delete('id');
      $delete = $this->DataModel->delete_data('tickettransaction','idTransaksi',$id);
      if($delete == FALSE){
        $this->response(array('report' => 'Data gagal di hapus', 502));
      }else{
        $this->response(array('report' => 'Data berhasil di hapus',$data,201));
      }
    }

  }

 ?>
