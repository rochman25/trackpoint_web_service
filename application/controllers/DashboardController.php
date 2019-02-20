<?php
    require APPPATH . '/libraries/REST_Controller.php';
    class DashboardController extends REST_Controller{
        function __construct($config = 'rest'){
            parent::__construct($config);
            $this->load->model('DataModel');
        }

        function data_wisata_sum_get(){
            $response = $this->DataModel->get_count_data('wisata','idWisata');
            $this->response($response);
        }

        function data_traveller_sum_get(){
            $response = $this->DataModel->get_count_data('traveller','idTraveller');
            $this->response($response);
        }

        function data_pengelola_sum_get(){
            $response = $this->DataModel->get_count_data('pengelola','idpengelola');
            $this->response($response);
        }
    }
?>