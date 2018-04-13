<?php

    class UserLoginIndex extends CI_Controller{
        
        public function LoginIndex($page="LoginIndex"){
            
            $this->load->view($page);
        }
    }
?>
