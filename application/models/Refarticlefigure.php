<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refarticlefigure extends CI_Model {

        public $Pkey;
        public $ArticleID;
        public $FigureID;
        public $FigureLocation;
        public function add($rowData){
            $this->load->database();
            $this->db->insert('refarticlefigure',$rowData);
            return $this->db->insert_id();
        }
}