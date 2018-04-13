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

        public function populate_detail_article($rowdata){
                $detail_article = new Articles;
                $detail_article->id = $rowdata['ArticleID'];
                $detail_article->title = $rowdata['Title'];
                $detail_article->subtitle = $rowdata['SubTitle'];
                $detail_article->main_figure = $rowdata['Main_Figure'];
                $detail_article->content = $rowdata['Content'];
                $detail_article->date = $rowdata['SubmitDate'];
                $detail_article->score = $rowdata['Score'];
                $detail_article->sharenum = $rowdata['ShareNum'];
                $detail_article->likenum = $rowdata['LikeNum'];
                $detail_article->commentnum = $rowdata['CommentNum'];

                $CI =& get_instance();
                $CI->load->model('tags');

                $this->load->database();

                //populate the tag parts of the article using tag model
                $tag_query = $this->db->query("select DefTag.TagID, DefTag.TagName, DefTag.TagProperty from DefTag, RefArticleTag where DefTag.TagID = RefArticleTag.TagID and 
                        RefArticleTag.ArticleID = ".$rowdata['ArticleID']);
                $article_tags = array();
                foreach ($tag_query->result_array() as $row)
                {   
                        array_push($article_tags, $CI->tags->populate_tag_entry($row));  
                }
                $detail_article->tags = $article_tags;

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
                $detail_article->authors = $article_authors;


                //populate comments
                $CI->load->model('comments');
                $first_comment_query = $this->db->query("select Comments.CommentID, Comments.Title, Comments.SubmitDate, 
                        Comments.Content, Comments.Author, Comments.ParentCommentID, Comments.ArticleID, 
                        Users.User_Name, Users.First_Name, Users.Last_Name, Users.Password, Users.Country, 
                        Users.PhoneNumber, Users.Email, Users.Level, Users.Photo, count(RefCommentLike.Pkey) as LikeNum
                         from Comments, Users, RefCommentLike where Comments.Author = Users.UserID 
                         and Comments.CommentID = RefCommentLike.CommentID 
                         and Comments.ArticleID = ".$rowdata['ArticleID']. " group by Comments.CommentID");
                $article_comments = array();
                foreach ($first_comment_query->result_array() as $row)
                {   
                        array_push($article_comments, $CI->comments->populate_comment_entry($row));  
                }
                $detail_article->comments = $article_comments;

                return $detail_article;
        }

        public function add_article($rowdata,$main_figure,$tags,$authors){


                $CI =& get_instance();
                $CI->load->model('figures');
                $CI->load->model('refarticlefigure');
                $CI->load->model('refarticletag');
                $CI->load->model('refarticleauthor');
                $this->load->database();
                $this->db->trans_begin();
                try{
                        $figure_id = $CI->figures->add_figure($main_figure);
                        $rowdata['Main_Figure'] = $figure_id;
        
        
                        $this->db->insert('articles',$rowdata);
                        $articleID = $this->db->insert_id();
        
        
                        $CI->refarticlefigure->add(array(
                                'ArticleID'=>$articleID,
                                'FigureID'=>$figure_id,
                                'FigureLocation'=>$main_figure['StoreLocation']
                        ));

                        $CI->refarticlefigure->add(array(
                                'ArticleID'=>$articleID,
                                'FigureID'=>$figure_id,
                                'FigureLocation'=>$main_figure['StoreLocation']
                        ));

                        foreach($tags as $key=>$val){
                                $CI->refarticletag->add(array(
                                        'articleID'=>$articleID,
                                        'TagID'=>$val,   
                                ));
                        }

                        foreach($authors as $key=>$val){
                                $CI->refarticleauthor->add(array(
                                        'articleID'=>$articleID,
                                        'AuthorID'=>$val,   
                                ));
                        }
                }
                catch(Exception $e){
                        throw $e;
                        $this->db->trans_rollback();
                }
                
                if ($this->db->trans_status() === FALSE)
                    $this->db->trans_rollback();
                else
                    $this->db->trans_commit();
        }
}