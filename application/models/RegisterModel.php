
<?php

    class RegisterModel extends CI_Model{
        
        public function registerQuery($username, $password){
            
            $this->load->database();
            
            $db_name = "Users";
            
            $this->db->set('User_Name', $username);
            $this->db->set('Password', $password);
            $level_default = 0;
            $this->db->set('Level', $level_default);
            
            if($this->db->insert('Users')){
                
                return "succeed";
            }
            else{
                
                return "not succeed";
            }
        }
    }
?>
