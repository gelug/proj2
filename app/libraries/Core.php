<?php

    class Core {
        protected $currentContoller = 'Pages';
        protected $currentMethode = 'index';
        protected $params = [];

        public function __construct() {
            $this->getParams();
        }
        public function getParams() {
            var_dump($_GET); 
        }
    }
