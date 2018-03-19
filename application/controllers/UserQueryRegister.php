<?php

    class UserQueryRegister extends CI_Controller{
        
        public function QueryRegister(){
            
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            
            $this->load->model("RegisterModel");                                //db operation
            $return_msg = $this->RegisterModel->registerQuery($username, $password);
            
            $this->output->set_output($return_msg);
        }
    }
?>
