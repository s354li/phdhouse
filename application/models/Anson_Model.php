
<?php

    class Anson_Model extends CI_Model{
        
        public function my_db($db_name){
            
            $this->load->database();
            
            //'Articles'
            $query = $this->db->get($db_name);  // Produces: SELECT * FROM mytable
            
            // Executes: SELECT * FROM mytable LIMIT 20, 10
            // (in MySQL. Other databases have slightly different syntax)
            
            foreach ($query->result() as $row)
            {
                return $row->Title;
            }
            
            /*
            return $query;
            */
        }
    }
?>
