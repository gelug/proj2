<?php
    class Pages extends Controller{
        public function __construct(){
            // echo "Pages loaded successfully";
        }
        
        public function index(){
            $data = [
                "title" => "HOMEPAGE",
            ];
            $this->view('pages/index', $data);
        }
        public function about(){
           
            $this->view('pages/about');
        }

        
    }
