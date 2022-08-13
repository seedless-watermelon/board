<?php

    class Users extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("users_m");
            $this->load->helper(array("url","date"));
            $this->load->library('pagination');
        }

        public function index()
        {
            $this->lists();
        }

        public function lists()
        {
            $uri_array = $this->uri->uri_to_assoc(3);
            $text1 = array_key_exists("search",$uri_array) ? urldecode($uri_array["search"]) : "";
            
            //$text1=urldecode($this->uri->segment(3) ?? "");
            
            if ($text1 == "")
                $base_url = "/users/lists/page";
            else
                $base_url = "/users/lists/search/$text1/page";
            $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

            $config["per_page"] = 5;
            $config["total_rows"] = $this->users_m->rowcount($text1); //전체 개수
            $config["uri_segment"] = $page_segment;
            $config["base_url"] = $base_url;
            $this->pagination->initialize($config);

            $data["page"] = $this->uri->segment($page_segment,0);
            $data["pagination"] = $this->pagination->create_links();

            $start=$data["page"];
            $limit=$config["per_page"];

            $data["text1"]=$text1;
            $data["list"]=$this->users_m->getlist($text1,$start,$limit);



            $this->load->view("header");
            $this->load->view("users_list",$data);
            $this->load->view("footer");
        }

        public function view()
        {
            $uri_array = $this->uri->uri_to_assoc(3);
            $uid=$this->uri->segment(4);
            $data["row"] = $this->users_m->getrow($uid);
            $page=array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0;

            $data["page"] = $page;

            $this->load->view("header");
            $this->load->view("users_view",$data);
            $this->load->view("footer");
        }

        public function del()
        {
            $uid=$this->uri->segment(4);
            $this->users_m->deleterow($uid);

            redirect("/users");
        }
        
        public function edit()
        {
            $uid=$this->uri->segment(4);

            $this->load->library("form_validation");

            $this->form_validation->set_rules("id","아이디","required|max_length[30]");
            $this->form_validation->set_rules("pwd","비밀번호","required|max_length[30]");
            $this->form_validation->set_rules("nickname","닉네임","required|max_length[30]");

            if ($this->form_validation->run()==false)
            {
                $this->load->view("header");
                $data["row"] = $this->users_m->getrow($uid);
                $this->load->view("users_edit",$data);
                $this->load->view("footer");
            }
            else
            {
            $data = array(
                'id' => $this->input->post("id",true),
                'pwd' => $this->input->post("pwd",true),
                'nickname' => $this->input->post("nickname",true),
                'email' => $this->input->post("email",true),
                'admin' => $this->input->post("admin", true)
                );
                    
                $result = $this->users_m->editrow($data,$uid);
    
                redirect("/users/view/uid/$uid");
            }
        }
    }

?>
