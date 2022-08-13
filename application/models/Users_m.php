<?php

class Users_m extends CI_Model
{
    public function getlist($text1, $start, $limit)
    {
        if (!$text1)
            $sql="SELECT * FROM users order by uid limit $start, $limit";
        else
            $sql="SELECT * FROM users where id like '%$text1%' order by uid limit $start, $limit";
            
        return $this->db->query($sql)->result();
    }

    function getrow($uid)
    {
        $sql="SELECT * FROM users where uid=$uid";
        return $this->db->query($sql)->row();
    }
    
    function insertrow($data)
    {
        return $this->db->insert("users", $data);
    }

    function deleterow($uid)
    {
        $sql="DELETE from users where uid=$uid";
        return $this->db->query($sql);
    }

    function editrow($row, $uid)
    {
        $where=array("uid"=>$uid);
        return $this->db->update("users", $row, $where);
    }

    function rowcount($text1)
    {
        if (!$text1)
            $sql="SELECT * FROM users order by uid";
        else
            $sql="SELECT * FROM users where id like '%$text1%' order by uid";
        return $this->db->query($sql)->num_rows();

    }
}
?>