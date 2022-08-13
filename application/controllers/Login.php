<?php

    class Login extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("login_m");
            $this->load->helper(array("url","date"));
        }
 
        public function index()
        {
        }


        public function check()
        {
            $id=$this->input->post("id",TRUE);
            $pwd=$this->input->post("pwd",TRUE);

            $row=$this->login_m->getrow($id,$pwd);
            if ($row)
            {
                $data=array(
                    "id"=>$row->id,
                    "nickname"=>$row->nickname,
                    "admin"=>$row->admin
                );
                $this->session->set_userdata($data);
                redirect("/b");
            }

            $this->load->view("header");
            $this->load->view("footer");
        }

        public function logout()
        {
            $data = array('id','admin','nickname');
            $this->session->unset_userdata($data);

            redirect("/b");

            $this->load->view("header");
            $this->load->view("footer");
        }
    }

?>
