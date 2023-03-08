<?php

    class Controller {
        public function model($model){
            require_once("../models/"  . $model . ".php");
            return new $model();
        }

        public function view($view, $data=[]){

            // var_dump("../views/" . $view . ".php"); exit;
            if(file_exists("../app/views/" . $view . ".php")){
                require_once("../app/views/" . $view . ".php");
            }   else {
                die( "The view " . $view . " does t exist");
            }        
        }
    }
