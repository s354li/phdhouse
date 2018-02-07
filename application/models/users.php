<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	public $id;
	public $username;
	public $firstname;
	public $lastname;
	public $userpassword;
	public $country;
	public $phonenumber;
	public $email;
	public $level;
	public $photo;


	public function populate_user_entry($rowdata)
        {
        		$instance_user = new Users;
                $instance_user->id = $rowdata['UserID'];
                $instance_user->username = $rowdata['User_Name'];
                $instance_user->firstname = $rowdata['First_Name'];
                $instance_user->lastname = $rowdata['Last_Name'];
                $instance_user->userpassword = $rowdata['Password'];
                $instance_user->country = $rowdata['Country'];
                $instance_user->phonenumber = $rowdata['PhoneNumber'];
                $instance_user->email = $rowdata['Email'];
                $instance_user->level = $rowdata['Level'];
                return $instance_user;
        }

}