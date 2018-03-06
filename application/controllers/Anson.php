<?php

    class Anson extends CI_Controller{
        
        public function MyView($page="Anson_view"){
            
            $data['mydata'] = "hello world";
            
            $this->load->view($page, $data);
        }
    }
?>
