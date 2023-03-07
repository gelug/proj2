<?php

    class Core {
        protected $currentContoller = 'Pages';
        protected $currentMethode = 'index';
        protected $params = [];

        public function __construct() {
           $url = $this->geUrl();
           if($url){
               if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                   $this->currentContoller = $url[0];
                   unset($url[0]);
               }
           }
           require_once('../app/controllers/' . $this->currentContoller . '.php');
           $this->currentContoller = new $this->currentContoller;
        }
        public function geUrl() {
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
            return false;
        }
    }