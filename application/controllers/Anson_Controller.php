<?php

    class Anson_Controller extends CI_Controller{
        
        public function MyView($page="Anson_view_signup_n_in"){
            
            $get_value = $this->input->get('some_data', TRUE);
            
            $this->load->model("Anson_Model");
            $model_return_true = $this->Anson_Model->my_db($get_value);
            
            $data['myfield'] = $model_return_true;
            $this->load->view($page, $data);
        }
    }
?>
