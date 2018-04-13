<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refarticleauthor extends CI_Model {

        public $Pkey;
        public $ArticleID;
        public $AuthorID;
        public function add($rowData){
            $this->load->database();
            $this->db->insert('refarticleauthor',$rowData);
            return $this->db->insert_id();
        }
}