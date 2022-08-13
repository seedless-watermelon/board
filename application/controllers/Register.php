<?php

class Register extends CI_Controller 
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("register_m");
        $this->load->helper(array("url","date"));
    }

    public function index()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("id","아이디","required|max_length[30]");
        $this->form_validation->set_rules("pwd","비밀번호","required|max_length[30]");
        $this->form_validation->set_rules("nickname","닉네임","required|max_length[30]");

        if ($this->form_validation->run()==false)
        {
            $this->load->view("header");
            $this->load->view("register");
            $this->load->view("footer");
        }
    }
    
    public function reg()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("id","아이디","required|max_length[30]|alpha_numeric");
        $this->form_validation->set_rules("pwd","비밀번호","required|max_length[30]|alpha_numeric");
        $this->form_validation->set_rules("nickname","닉네임","required|max_length[30]|alpha_numeric");
        $this->form_validation->set_rules("check_id","중복확인","required");

        if ($this->form_validation->run()==false)
        {
            $this->load->view("header");
            $this->load->view("register");
            $this->load->view("footer");
        }
        else
        {
        $data = array(
            'id' => $this->input->post("id",true),
            'pwd' => $this->input->post("pwd",true),
            'nickname' => $this->input->post("nickname",true),
            'email' => $this->input->post("email",true),
            );
                
            $result = $this->register_m->insertrow($data);

            redirect("/");
        }
    }

    public function idcheck() 
    {
        $id=$this->uri->segment(3);
        
        $this->load->view("idcheck");
 
        $result=$this->register_m->checkid($id);
    }

}

?>