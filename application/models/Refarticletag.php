<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refarticletag extends CI_Model {

        public $Pkey;
        public $ArticleID;
        public $TagID;
        public function add($rowData){
            $this->load->database();
            $this->db->insert('refarticletag',$rowData);
            return $this->db->insert_id();
        }
}