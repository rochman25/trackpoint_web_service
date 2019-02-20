<?php

  /**
   *
   */
  require APPPATH . '/libraries/REST_Controller.php';

  class LoginController extends REST_Controller
  {

    function __construct($config = 'rest')
    {
      parent::__construct($config);
      $this->load->model('DataModel');
    }

    function index_post(){
      $username = $this->post('username');
      $password = $this->post('password');
      $where = array(
                  'username' => $username,
                  'password' => $password,
                );
      $where2 = array(
                  'username' => $username,
                  'status' => 'Aktif'
                );
      $traveller = $this->DataModel->login('traveller',$where)->num_rows();
      if($traveller > 0){
        $traveller = $this->DataModel->login('traveller',$where2)->num_rows();
        $dataTraveller = $this->DataModel->login('traveller',$where2)->row();
        if($traveller > 0){
          $id = $dataTraveller->idTraveller;
          // $data = $this->DataModel->get_dataWhere('traveller','id')
          $data_session = array(
                          'idTraveller' => $id,
                          'username' => $username,
                          'password' => $password,
                        );
        $this->response(array('status' => 'login','result' => $data_session,200));
        }else{
         $data = array(
                          'username' => $username,
                          'password' => $password,
                        );
        $this->response(array('status' => 'unlogin',$data,404));
        }
      }else{
         $data = array(
                          'username' => $username,
                          'password' => $password,
                        );
        $this->response(array('status' => 'unknown',$data,404));
      }

      }

      function loginAdmin_post(){
        $username = $this->post('username');
        $password = $this->post('password');
        $where = array(
                  'username' => $username,
                  'password' => $password,
                );
        $admin = $this->DataModel->login('admin',$where)->num_rows();
        if($admin > 0){
          $data_session = array(
                            'username' => $username,
                            'password' => $password
                          );
          $this->response(array('status' => 'login',$data_session,200));
        }else{
          $data_session = array(
                    'username' => $username,
                    'password' => $password
                  );
          $this->response(array('status' => 'unknown',$data_session,404));
        }
      }

      function loginPengelola_post(){
        $username = $this->post('username');
        $password = $this->post('password');
        $where = array(
                  'username' => $username,
                  'password' => $password,
                );
        $admin = $this->DataModel->login('pengelola',$where)->num_rows();
        if($admin > 0){
          $data = $this->DataModel->get_dataWhere('pengelola','username',$username)->row();
          $data_session = array(
                            'id' => $data->idpengelola,
                            'username' => $username,
                            'password' => $password
                          );
          $this->response(array('status' => 'login','data'=>$data_session,200));
        }else{
          $data_session = array(
                    'username' => $username,
                    'password' => $password
                  );
          $this->response(array('status' => 'unknown',$data_session,404));
        }
      }

    }
 ?>
