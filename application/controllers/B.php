<?php

    class B extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("b_m");
            $this->load->helper(array("url","date"));
            $this->load->library('pagination');
            $this->load->library('upload');
        }

        public function index()
        {
            $this->board();
        }

        public function board()
        {
            $uri_array = $this->uri->uri_to_assoc(3);
            $text1 = array_key_exists("search",$uri_array) ? urldecode($uri_array["search"]) : "";
            //$text1=urldecode($this->uri->segment(3) ?? "");
            
            if ($text1 == "")
                $base_url = "/b/board/page";
            else
                $base_url = "/b/board/search/$text1/page";
            $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

            $config["per_page"] = 20;
            $config["total_rows"] = $this->b_m->rowcount($text1); //전체 개수
            $config["uri_segment"] = $page_segment;
            $config["base_url"] = $base_url;
            $this->pagination->initialize($config);

            $data["page"] = $this->uri->segment($page_segment,0);
            $data["pagination"] = $this->pagination->create_links();

            $start=$data["page"];
            $limit=$config["per_page"];

            $data["text1"]=$text1;
            $data["list"]=$this->b_m->boardlist($text1,$start,$limit);



            $this->load->view("header");
            $this->load->view("board",$data);
            $this->load->view("footer");
        }

        public function notice()
        {
            $uri_array = $this->uri->uri_to_assoc(3);
            $text1 = array_key_exists("search",$uri_array) ? urldecode($uri_array["search"]) : "";
            // $text1=urldecode($this->uri->segment(3) ?? "");
            
            if ($text1 == "")
                $base_url = "/b/notice/page";
            else
                $base_url = "/b/notice/search/$text1/page";
            $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

            $config["per_page"] = 20;
            $config["total_rows"] = $this->b_m->rowcount($text1); //전체 개수
            $config["uri_segment"] = $page_segment;
            $config["base_url"] = $base_url;
            $this->pagination->initialize($config);

            $data["page"] = $this->uri->segment($page_segment,0);
            $data["pagination"] = $this->pagination->create_links();

            $start=$data["page"];
            $limit=$config["per_page"];

            $data["text1"]=$text1;
            $data["list"]=$this->b_m->noticelist($text1,$start,$limit);



            $this->load->view("header");
            $this->load->view("notice",$data);
            $this->load->view("footer");
        }
 
        public function view()
        {
            $uri_array = $this->uri->uri_to_assoc(3);
            $num=$this->uri->segment(3);
            $data["row"] = $this->b_m->getrow($num);
            $page=array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0;
            $data["views"] = $this->b_m->viewcount($num);

            $data["page"] = $page;

            $this->load->view("header");
            $this->load->view("board_view",$data);
            $this->load->view("footer");
        }

        public function del()
        {
            $num=$this->uri->segment(4);
            $this->b_m->deleterow($num);

            redirect("/b/board");
        }
        
        public function edit()
        {
            $num=$this->uri->segment(4);

            $this->load->library("form_validation");

            $this->form_validation->set_rules("title","제목","required|max_length[50]");
            $this->form_validation->set_rules("content","내용","required|max_length[3000]");

            if ($this->form_validation->run()==false)
            {
                $this->load->view("header");
                $data["row"] = $this->b_m->getrow($num);
                $this->load->view("board_edit",$data);
                $this->load->view("footer");
            }
            else
            {
            $data = array(
                'title' => $this->input->post("title",true),
                'content' => $this->input->post("content",true),
                'writedaytime' => date("Y-m-d H:i:s")
                );
                $picname = $this->call_upload();
                if ($picname) $data["pic"] = $picname;

                $result = $this->b_m->editrow($data,$num);
    
                redirect("/b/view/$num");
            }
        }

        public function write()
        {
            $this->load->library("form_validation");
    
            $this->form_validation->set_rules("title","제목","required|max_length[50]");
            $this->form_validation->set_rules("content","글 내용","required|max_length[2000]");
    
            if ($this->form_validation->run()==false)
            {
                $this->load->view("header");
                $this->load->view("board_write");
                $this->load->view("footer");
            }
            else
            {
            $data = array(
                'title' => $this->input->post("title",true),
                'content' => $this->input->post("content",true),
                'board' => $this->input->post("board", true),
                'writer' => $this->session->userdata("nickname"),
                'writedaytime' => date("Y-m-d H:i:s")
                );
                $picname = $this->call_upload();
                if ($picname) $data["pic"] = $picname;
                    
                $result = $this->b_m->insertrow($data);
    
                redirect("/b/board");
            }
        }

        public function writenotice()
        {
            $this->load->library("form_validation");
    
            $this->form_validation->set_rules("title","제목","required|max_length[50]");
            $this->form_validation->set_rules("content","글 내용","required|max_length[2000]");
    
            if ($this->form_validation->run()==false)
            {
                $this->load->view("header");
                $this->load->view("board_write");
                $this->load->view("footer");
            }
            else
            {
            $data = array(
                'title' => $this->input->post("title",true),
                'content' => $this->input->post("content",true),
                'writer' => $this->session->userdata("nickname"),
                'writedaytime' => date("Y-m-d H:i:s"),
                'board' => 'notice'
                );
                $picname = $this->call_upload();
                if ($picname) $data["pic"] = $picname;
                    
                $result = $this->b_m->insertrow($data);
    
                redirect("/b/notice");
            }
        }

        public function call_upload()
        {
            $config['upload_path']	= './pics';
            $config['allowed_types']	= 'gif|jpg|png|webp'; 
            $config['overwrite']	= TRUE; 
            $this->upload->initialize($config); 
            if (!$this->upload->do_upload('pic')) 
                $picname="";
            else
                $picname=$this->upload->data("file_name");
            return $picname;
        }
        
    }

?>
