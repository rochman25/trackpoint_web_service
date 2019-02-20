<?php
  /**
   *
   */
  class DataModel extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
      $this->load->helper('db');
    }

    public function wisata_data($table){
      $data = $this->db->get($table)->result();
      return $data;
    }

    public function get_costum_data($table,$col){
      $this->db->select($col);
      $query = $this->db->get($table);
      return $query;
    }

    public function get_data($table){
      $query = $this->db->get($table);
      return $query;
    }

    public function get_dataWhere($table,$col,$kondisi){
      $this->db->select('*');
      $this->db->where($col,$kondisi);
      $query = $this->db->get($table);
      return $query;
    }

    public function get_dataWhere1($select,$table,$col,$kondisi){
      $this->db->select($select);
      $this->db->where($col,$kondisi);
      $query = $this->db->get($table);
      return $query;
    }

    public function get_dataWhereCustom($table,$field,$col,$kondisi){
      $this->db->select($field);
      $this->db->order_by('rating','desc');
      $this->db->where($col,$kondisi);
      $query = $this->db->get($table);
      return $query;
    }

    public function get_dataWhere_orderBy($table,$col,$order){
      $this->db->order_by($col,$order);
      $query = $this->db->get($table);
      return $query;
    }

    public function get_join($table1,$custom,$col,$table2){
      $this->db->select($custom);
      $this->db->from($table1);
      $this->db->join($table2,$col);
      $query = $this->db->get();
      return $query;
    }

    public function get_join_where($table1,$relasi,$table2,$join,$where1,$kondisi1,$where2,$kondisi2){
      $this->db->select('*');
      $this->db->from($table1);
      $this->db->join($table2,$relasi,$join);
      $this->db->where($where1,$kondisi1);
      $this->db->where($where2,$kondisi2);
      $query = $this->db->get();
      return $query;
    }

    public function get_count_data($table,$col){
      $this->db->select($col);
      $this->db->count_all_results($table);
      $query = $this->db->get($table);
      return $query->num_rows();
    }


    public function post_data($table,$data){
      $arrayData = $this->db->insert($table,$data);
      return $arrayData ? TRUE : FALSE;
    }

    public function put_data($table,$data,$col,$kondisi){
      $this->db->where($col,$kondisi);
      $arrayData = $this->db->update($table,$data);
      return $arrayData ? TRUE : FALSE;
    }

    public function delete_data($table,$col,$kondisi){

      // $this->db->query(drop_foreign_key('tickettransaction','idWisata'));
      $this->db->where($col,$kondisi);
      $query = $this->db->delete($table);
      if($query == TRUE){
        return TRUE;
      }
      return FALSE;
    }

    public function login($table,$where)
    {
        return $this->db->get_where($table,$where);
        // $q  = $this->db->select('password')->from('traveller')->where('username',$username)->get()->row();
        //
        // // if($q == ""){
        // //     return array('status' => 204,'message' => 'Username not found.');
        // // } else {
        // //     $hashed_password = $q->password;
        // //     $id              = $q->id;
        // //      echo $hashed_password ." ".$password;
        // //exit;
        //     // if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
        //     //    $last_login = date('Y-m-d H:i:s');
        //     //    $token = crypt(substr( md5(rand()), 0, 7));
        //     //    $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
        //     //    $this->db->trans_start();
        //     //    $this->db->where('id',$id)->update('users',array('last_login' => $last_login));
        //     //    $this->db->insert('users_authentication',array('users_id' => $id,'token' => $token,'expired_at' => $expired_at));
        //        if ($this->db->trans_status() === FALSE){
        //           $this->db->trans_rollback();
        //           return array('status' => 500,'message' => 'Internal server error.');
        //        } else {
        //           $this->db->trans_commit();
        //           return array('status' => 200,'message' => 'Successfully login.');
        //           // , 'token' => $token
        //        }
        //     // } else {
        //         echo "Wrong password";
        //         exit();
        //        return array('status' => 204,'message' => 'Wrong password.');
        //     // }
        }
    // }

  }

?>
