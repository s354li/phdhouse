<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct(){
         parent::__construct();
         $this->load->helper('url');
         $this->load->model('vm_articles'); //Load the Model here   
         $this->load->model('tags'); //Load the Model here   
         $this->load->model('articles'); //Load the Model here   
 	}

    //RefArticleAuthor
    //RefArticleFigure
    //RefArticleTag
	public function post()
	{
        $data = array();
        $data['all_tags'] = $this->tags->get_all_tags();
		$this->load->view('post_article', $data);
    }

    public function post_handler(){
        try{
            $config['upload_path']      = './uploads/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('Main_Figure'))
            {
                $error = array('error' => $this->upload->display_errors());
                throw new Exception($error['error']);
            }
            else
            {
                $article = array(
                    "Title"=>$this->input->post('Title'),
                    "SubTitle"=>$this->input->post('SubTitle'),
                    "Main_Figure"=>'Main_Figure',
                    "Content"=>$this->input->post('Content'),
                    "Score"=>'123',
                    "SubmitDate"=>date('Y-m-d h:i:s',time()),
                    "ApprovedFlag"=>'F',
                    "ApprovedDate"=>NULL,
                    "ApprovedBy"=>NULL,
                    "ApprovedComment"=>NULL,
                );

                $data = $this->upload->data();
                // var_dump($data);
                $main_figure = array(
                    'StoreLocation'=>$config['upload_path'].$data['file_name'],
                    'Title'=>$this->input->post('Title2'),
                    'Content'=>$this->input->post('Content2'),
                    "SubmitDate"=>date('Y-m-d h:i:s',time()),
                );
                $tags = $this->input->post('tags');
                $authors = array();
                $authors[] = $this->get_user()['UserID'];
                $this->articles->add_article($article,$main_figure,$tags,$authors);
                echo json_encode(array(
                    'code'=>0,
                ));
            }
        }catch(Exception $e){
            echo json_encode(array(
                'code'=>1001,
                'msg'=>$e->getMessage()
            ));
        }
    }
    

    //获取当前登录用户的信息
    //a user info adapter
    //just for test
    //we can get real info here instead the test info
    public function get_user(){
        /*
            UserID      int auto_increment primary key,
            User_Name   varchar(500)  not null,
            First_Name  varchar(500)  null,
            Last_Name   varchar(500)  null,
            Password    varchar(1000) not null,
            Country     varchar(250)  null,
            PhoneNumber varchar(250)  null,
            Email       varchar(350)  null,
            Level       int           not null,
            Photo       longblob      null
        */
        //1	grace.li	Siyuan	Li	920328	Canada	12269781254	zoujinshenhai@gmail.com	1	0x
        return array(
            'UserID'=>1,
            'User_Name'=>'grace.li',
            'First_Name'=>'Siyuan',
            'Last_Name'=>'Li',
            'Password'=>'920328',
            'Country'=>'Canada',
            'PhoneNumber'=>'12269781254',
            'Email'=>'zoujinshenhai@gmail.com',
            'Level'=>1,
            'Photo'=>NULL
        );
    }
}
