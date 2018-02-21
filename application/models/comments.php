<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Model {

        public $id;
        public $title;
        public $content;
        public $author;
        public $date;
        public $likenum;
        public $commentnum;
        public $comments;

        public function populate_comment_entry($rowdata)
        {
                $CI =& get_instance();
                $CI->load->model('users');
                $this->load->database();

                $instance_comment = new Comments;
                $instance_comment->id = $rowdata['CommentID'];
                $instance_comment->title = $rowdata['Title'];
                $instance_comment->content = $rowdata['Content'];
                $instance_comment->date = $rowdata['SubmitDate'];
                $instance_comment->likenum = $rowdata['LikeNum'];

                //populate author be a users object
                $instance_comment->author = $CI->users->populate_user_entry($rowdata);

                //populate comments using comments object
                $instance_comment->comments = get_nested_comments($rowdata['CommentID'], $rowdata['ArticleID']);

                $instance_comment->comments = $rowdata['CommentNum'];

                
                return $instance_comment;
        }

        public function get_nested_comments($commentID, $articleID){
                $nested_comment_query = $this->db->query("");
                $nested_article_comments = array();
                foreach ($nested_comment_query->result_array() as $row)
                {  
                        while($nested_comment_query->num_rows() > 0){
                                get_nested_comments($row['CommentID'], $row['ArticleID']);
                        } 
                        array_push($nested_article_comments, $CI->comments->populate_comment_entry($row));  
                }
        }
}