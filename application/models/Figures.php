<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Figures extends CI_Model {

        public $FigureID;
        public $Content;
        public $SubmitDate;
        public $Title;
        public $StoreLocation;

        public function add_figure($rowData){
            $this->load->database();
            $this->db->insert('figures',$rowData);
            return $this->db->insert_id();
        }
}