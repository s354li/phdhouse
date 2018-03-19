<?php

    class UserQueryLogin extends CI_Controller{
        
        public function QueryLogin(){
            
            $username = $this->input->post("username");                         //get input
            $password_from_frontEnd = $this->input->post("password");
            
            $this->load->model("LoginModel");                                   //db operation
            $password_from_db = $this->LoginModel->loginQuery($username);
            
            if( $password_from_db=="invalid username" ){                        //pwd comparison
                
                $this->output->set_output("  invalid username  ");
            }
            else if( $password_from_frontEnd==$password_from_db ){
                
                $this->output->set_output("  password correct  ");
            }
            else{
                
                $this->output->set_output("  password incorrect  "); 
            }
        }
    }
?>
