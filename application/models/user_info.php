<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Info extends CI_Model {
    private $userID;

    public function get_user_info($userID) {
        $this->userID = $userID;
        $userInfo = array();
        $userInfo['user_basic_info']         = $this->get_user_basic_info();
        $userInfo['user_followers']          = $this->get_user_followers();
        $userInfo['user_followings']         = $this->get_user_followings();
        return $userInfo;
    }
    private function get_user_basic_info() {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM users WHERE UserID = ".$this->userID);
        $user_basic_info = $query->result_array()[0];
        unset($user_basic_info['Password']);
        return $user_basic_info;
    }
    private function get_user_followers() {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM refuserauthorfollow, users WHERE refuserauthorfollow.FollowerID = users.UserID AND refuserauthorfollow.AuthorID = ".$this->userID);
        $user_followers = $query->result_array();
        return $user_followers;
    }
    private function get_user_followings() {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM refuserauthorfollow, users WHERE refuserauthorfollow.AuthorID = users.UserID AND refuserauthorfollow.FollowerID = ".$this->userID);
        $user_followings = $query->result_array();
        return $user_followings;
    }
    public function get_usermeta_info($userID) {
        $this->load->database();
        $query = $this->db->query("SELECT meta_key, meta_value FROM usermeta WHERE user_id = ".$userID);
        $raw_usermeta = $query->result_array();
        $usermeta = array();
        foreach ($raw_usermeta as $um) {
            $usermeta[$um["meta_key"]] = $um["meta_value"];
        }
        return $usermeta;
    }
    public function save_user_info($userID, $data) {
        $this->load->database();
        $school_query = $this->db->query("SELECT EXISTS (SELECT 1 FROM usermeta WHERE meta_key='school' and user_id=".$userID.") AS result");
        $school_exist = $school_query->result_array();
        if (!$school_exist[0]['result']) {
            $this->db->query("INSERT INTO usermeta (user_id, meta_key, meta_value) VALUES (".$userID.", 'school', '".$data["school"]."')");
        }
        else {
            $this->db->query("UPDATE usermeta SET meta_value = '".$data["school"]."' WHERE meta_key = 'school' AND user_id = ".$userID);
        }

        $major_query = $this->db->query("SELECT EXISTS (SELECT 1 FROM usermeta WHERE meta_key='major' and user_id=".$userID.") AS result");
        $major_exist = $major_query->result_array();
        if (!$major_exist[0]['result']) {
            $this->db->query("INSERT INTO usermeta (user_id, meta_key, meta_value) VALUES (".$userID.", 'major', '".$data["major"]."')");
        }
        else {
            $this->db->query("UPDATE usermeta SET meta_value = '".$data["major"]."' WHERE meta_key = 'major' AND user_id = ".$userID);
        }

        $occupation_query = $this->db->query("SELECT EXISTS (SELECT 1 FROM usermeta WHERE meta_key='occupation' and user_id=".$userID.") AS result");
        $occupation_exist = $occupation_query->result_array();
        if (!$occupation_exist[0]['result']) {
            $this->db->query("INSERT INTO usermeta (user_id, meta_key, meta_value) VALUES (".$userID.", 'occupation', '".$data["occupation"]."')");
        }
        else {
            $this->db->query("UPDATE usermeta SET meta_value = '".$data["occupation"]."' WHERE meta_key = 'occupation' AND user_id = ".$userID);
        }

        $description_query = $this->db->query("SELECT EXISTS (SELECT 1 FROM usermeta WHERE meta_key='description' and user_id=".$userID.") AS result");
        $description_exist = $description_query->result_array();
        if (!$description_exist[0]['result']) {
            $this->db->query("INSERT INTO usermeta (user_id, meta_key, meta_value) VALUES (".$userID.", 'description', '".$data["description"]."')");
        }
        else {
            $this->db->query("UPDATE usermeta SET meta_value = '".$data["description"]."' WHERE meta_key = 'description' AND user_id = ".$userID);
        }
        
        $this->db->query("UPDATE users SET Country = '".$data["country"]."' WHERE UserID = ".$userID);
    }
}