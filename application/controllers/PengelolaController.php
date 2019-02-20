<?php
/**
 *
 */
require APPPATH . '/libraries/REST_Controller.php';
class PengelolaController extends REST_Controller
{

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('DataModel');
    }

    public function data_pengelola_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $pengelola = $this->DataModel->get_data('pengelola')->result();
        } else {
            $pengelola = $this->DataModel->get_dataWhere('pengelola', 'idpengelola', $id)->row();
        }

        if ($pengelola) {
            $this->response($pengelola, 200);
        } else {
            $this->response(array('report' => 'Maaf data yang anda cari tidak ada'));
        }
    }

    public function input_data_post()
    {
        $data = array(
            'idpengelola' => $this->post('id'),
            'username' => $this->post('username'),
            'nama_lengkap' => $this->post('nama'),
            'email' => $this->post('email'),
            'nohp' => $this->post('nohp'),
            'password' => $this->post('password'),
            'jk' => $this->post('jk'),
            'alamat' => $this->post('alamat'),
        );
        $insert = $this->DataModel->post_data('pengelola', $data);
        if ($insert == false) {
            $this->response(array('status' => 'Gagal input data', $data, 500));
        } else {
            $this->response(array('status' => 'berhasil input data', $data, 200));
        }
    }

    public function edit_data_put()
    {
        $id = $this->put('id');
        $data = array(
            'idpengelola' => $this->put('id'),
            'username' => $this->put('username'),
            'nama_lengkap' => $this->put('nama'),
            'email' => $this->put('email'),
            'nohp' => $this->put('nohp'),
            'password' => $this->put('password'),
            'jk' => $this->put('jk'),
            'alamat' => $this->put('alamat'),
        );
        $update = $this->DataModel->put_data('pengelola', $data, 'idpengelola', $id);
        if ($update == false) {
            $this->response(array('report' => 'data gagal di edit', 502));
        } else {
            $this->response(array('report' => 'Data Berhasil di edit', $data, 200));
        }
    }

    public function delete_data_delete()
    {
        $id = $this->delete('id');
        $delete = $this->DataModel->delete_data('pengelola', 'idpengelola', $id);
        if ($delete == false) {
            $this->response(array('report' => 'Data gagal di hapus', 502));
        } else {
            $this->response(array('report' => 'Data berhasil di hapus', 201));
        }
    }

}
