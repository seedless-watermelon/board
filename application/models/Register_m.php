<?php

class Register_m extends CI_Model
{
    function insertrow($data)
    {
        return $this->db->insert('users', $data);
    }

    function checkid($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        } 
        else {
            return false;
        }
    }
}
?>