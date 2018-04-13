
<?php

    class LoginModel extends CI_Model{
        
        public function loginQuery($username){
            
            $db_name = "Users";
            
            $this->load->database();
            
            $query = $this->db->get_where($db_name, array("User_Name" => $username));
            
            if ($query->num_rows() > 0)
            {
                
                foreach ($query->result() as $row)
                {

                    return $row->Password;
                }
            }
            else{
                
                return "invalid username";
            }
        }
    }
?>
