<?php

class B_m extends CI_Model
{
    public function boardlist($text1, $start, $limit)
    {
        if (!$text1)
            $sql="SELECT * FROM board where board='board' order by num DESC limit $start, $limit";
        else
            $sql="SELECT * FROM board where title like '%$text1%' AND board='board' order by num DESC limit $start, $limit";
            
        return $this->db->query($sql)->result();
    }

    public function noticelist($text1, $start, $limit)
    {
        if (!$text1)
            $sql="SELECT * FROM board where board='notice' order by num DESC limit $start, $limit";
        else
            $sql="SELECT * FROM board where title like '%$text1%' AND board='notice' order by num DESC limit $start, $limit";
            
        return $this->db->query($sql)->result();
    }

    function getrow($num)
    {
        $sql="SELECT * FROM board where num=$num";
        return $this->db->query($sql)->row();
    }
    
    function insertrow($data)
    {
        return $this->db->insert("board", $data);
    }

    function deleterow($num)
    {
        $sql="DELETE from board where num=$num";
        return $this->db->query($sql);
    }

    function editrow($row, $num)
    {
        $where=array("num"=>$num);
        return $this->db->update("board", $row, $where);
    }

    function rowcount($text1)
    {
        if (!$text1)
            $sql="SELECT * FROM board order by num DESC";
        else
            $sql="SELECT * FROM board where title like '%$text1%' order by num DESC";
        return $this->db->query($sql)->num_rows();
    }

    function viewcount($num)
    {
        $sql="UPDATE board set views = views+1 where num = $num";
        return $this->db->query($sql);
    }
}
?>