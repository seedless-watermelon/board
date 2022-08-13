<?php

class Login_m extends CI_Model
{
    function getrow($id,$pwd)
    {
        $sql="SELECT * FROM users where id='$id' and pwd='$pwd'";
        return $this->db->query($sql)->row();
    }
}
?> 