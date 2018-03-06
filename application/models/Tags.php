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

}