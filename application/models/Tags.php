<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Model {

        public $id;
        public $name;
        public $property;

        public function populate_tag_entry($rowdata)
        {
                $instance_tag = new Tags;
                $instance_tag->id = $rowdata['TagID'];
                $instance_tag->name = $rowdata['TagName'];
                $instance_tag->property = $rowdata['TagProperty'];
                return $instance_tag;
        }

        public function get_all_tags(){
                $this->load->database();
                $query = $this->db->get('DefTag');
                $all_tags = array();
                foreach ($query->result_array() as $row)
                        $all_tags[] = $row;
                return $all_tags;
        }

}