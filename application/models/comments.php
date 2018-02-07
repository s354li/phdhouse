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
                $instance_comment = new Comments;
                $instance_comment->id = $rowdata['CommentID'];
                $instance_comment->title = $rowdata['Title'];
                $instance_comment->content = $rowdata['Content'];
                //populate author be a users object

                $instance_comment->date = $rowdata['SubmitDate'];
                $instance_comment->likenum = $rowdata['LikeNum'];
                $instance_comment->commentnum = $rowdata['CommentNum'];

                //populate comments using comments object
                return $instance_comment;
        }
}