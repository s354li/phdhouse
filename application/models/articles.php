<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Model {

        public $id;
        public $title;
        public $subtitle;
        public $main_figure;
        public $content;
        public $date;
        public $score;
        public $sharenum;
        public $likenum;
        public $commentnum;
        public $comments;
        public $tags;
        public $authors;

        public function populate_home_article($rowdata)
        {
                $home_article = new Articles;
                $home_article->id = $rowdata['ArticleID'];
                $home_article->title = $rowdata['Title'];
                $home_article->subtitle = $rowdata['SubTitle'];
                $home_article->main_figure = $rowdata['Main_Figure'];
                $home_article->content = $rowdata['Content'];
                $home_article->date = $rowdata['SubmitDate'];
                $home_article->score = $rowdata['Score'];
                $home_article->sharenum = $rowdata['ShareNum'];
                $home_article->likenum = $rowdata['LikeNum'];
                $home_article->commentnum = $rowdata['CommentNum'];

                $CI =& get_instance();
                $CI->load->model('tags');

                $this->load->database();

                //populate the tag parts of the article using tag model
                $query = $this->db->query("select DefTag.TagID, DefTag.TagName, DefTag.TagProperty from DefTag, RefArticleTag where DefTag.TagID = RefArticleTag.TagID and 
                        RefArticleTag.ArticleID = ".$rowdata['ArticleID']);
                $article_tags = array();
                foreach ($query->result_array() as $row)
                {   
                        array_push($article_tags, $CI->tags->populate_tag_entry($row));  
                }
                $home_article->tags = $article_tags;

                //populate the author parts of the article using the author model
                $CI->load->model('users');
                $author_query = $this->db->query("select Users.UserID, Users.User_Name, Users.First_Name, Users.Last_Name, Users.Password, Users.Country, Users.PhoneNumber, 
                        Users.Email, Users.Level, Users.Photo from Users, RefArticleAuthor where RefArticleAuthor.AuthorID = Users.UserID 
                        and RefArticleAuthor.ArticleID = ". $rowdata['ArticleID']);

                $article_authors = array();
                foreach($author_query->result_array() as $row)
                {
                        array_push($article_authors, $CI->users->populate_user_entry($row));
                }
                $home_article->authors = $article_authors;

                return $home_article;
        }

        public function populate_specific_article($rowdata){
                $this->id = $rowdata['ArticleID'];
                $this->title = $rowdata['Title'];
                $this->subtitle = $rowdata['SubTitle'];
                $this->main_figure = $rowdata['Main_Figure'];
                $this->content = $rowdata['Content'];
                $this->date = $rowdata['SubmitDate'];
                $this->score = $rowdata['Score'];
                $this->sharenum = $rowdata['ShareNum'];
                $this->likenum = $rowdata['LikeNum'];
                $this->commentnum = $rowdata['CommentNum'];

                $CI =& get_instance();
                $CI->load->model('tags');

                $this->load->database();

                //populate tags
                $tag_query = $this->db->query("select DefTag.TagID, DefTag.TagName, DefTag.TagProperty from DefTag, RefArticleTag where DefTag.TagID = RefArticleTag.TagID and 
                        RefArticleTag.ArticleID = ".$rowdata['ArticleID']);
                $article_tags = array();
                foreach ($tag_query->result_array() as $row)
                {   
                        array_push($article_tags, $CI->tags->populate_tag_entry($row));  
                }
                $this->tags = $article_tags;


                //populate comments
                $Comment_CI =& get_instance();
                $Comment_CI->load->model('comments');

                $comment_query = $this->db->query("select DefTag.TagID, DefTag.TagName, DefTag.TagProperty from DefTag, RefArticleTag where DefTag.TagID = RefArticleTag.TagID and 
                        RefArticleTag.ArticleID = ".$rowdata['ArticleID']);
                $article_comments = array();
                foreach ($comment_query->result_array() as $row)
                {   
                        array_push($article_comments, $CI->comments->populate_comment_entry($row));  
                }
                $this->comments = $article_comments;

                return $this;
        }

}