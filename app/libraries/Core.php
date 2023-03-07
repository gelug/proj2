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
            
            //set current methods and params
            if(isset($url[1])){
                if(method_exists($this->currentContoller, $url[1])){
                    $this->currentMethode = $url[1];
                    unset($url[1]);
                }
                var_dump($this->currentMethode);
            }
            // get params
            $this->params = $url ? array_values($url) : [];

            //call method with params
            call_user_func_array([$this->currentContoller, $this->currentMethode], $this->params);

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