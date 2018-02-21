<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VM_articles extends CI_Model {

        //get the first ten articles loaded on the home page by submit date
        public function get_first_five_entries()
        {
                $CI =& get_instance();
                $CI->load->model('articles');
                $this->load->database();
                $query = $this->db->query("select Articles.ArticleID, Articles.Title, Articles.SubTitle, Articles.Main_Figure, Articles.Content, Articles.SubmitDate, Articles.Score, 
                        count(RefUserArticleCollection.UserID) as ShareNum, count(RefArticleLike.UserID) as LikeNum, count(Comments.CommentID) as CommentNum 
                        from ((Articles left join Comments on Articles.ArticleID = Comments.ArticleID) left join RefUserArticleCollection on Articles.ArticleID = RefUserArticleCollection.
                        ArticleID) left join RefArticleLike on Articles.ArticleID = RefArticleLike.ArticleID
                        where Articles.ApprovedFlag = 'T' group by Articles.ArticleID order by SubmitDate desc limit 5");
                $first_ten_articles = array();
                foreach ($query->result_array() as $row)
                {   
                        array_push($first_ten_articles, $CI->articles->populate_home_article($row));  
                }
                return $first_ten_articles;
        }

        //get all the articles order by submit date
        public function get_all_entries(){
                $CI =& get_instance();
                $CI->load->model('articles');
                $this->load->database();
                $query = $this->db->query("select Articles.ArticleID, Articles.Title, Articles.SubTitle, Articles.Main_Figure, Articles.Content, Articles.SubmitDate, Articles.Score, 
                        count(RefUserArticleCollection.UserID) as ShareNum, count(RefArticleLike.UserID) as LikeNum, count(Comments.CommentID) as CommentNum 
                        from ((Articles left join Comments on Articles.ArticleID = Comments.ArticleID) left join RefUserArticleCollection on Articles.ArticleID = RefUserArticleCollection.
                        ArticleID) left join RefArticleLike on Articles.ArticleID = RefArticleLike.ArticleID
                        where Articles.ApprovedFlag = 'T' group by Articles.ArticleID order by SubmitDate desc");
                $first_all_articles = array();
                foreach ($query->result_array() as $row)
                {   
                        array_push($first_all_articles, $CI->articles->populate_home_article($row));  
                }
                return $first_all_articles;
        }

        //get a specific article by article id
        public function get_specific_entry($article_id){
                $CI =& get_instance();
                $CI->load->model('articles');
                $this->load->database();
                $query = $this->db->query("select Articles.ArticleID, Articles.Title, Articles.SubTitle, Articles.Main_Figure, Articles.Content, Articles.SubmitDate, Articles.Score, 
                        count(RefUserArticleCollection.UserID) as ShareNum, count(RefArticleLike.UserID) as LikeNum, count(Comments.CommentID) as CommentNum 
                        from ((Articles left join Comments on Articles.ArticleID = Comments.ArticleID) left join RefUserArticleCollection on Articles.ArticleID = RefUserArticleCollection.
                        ArticleID) left join RefArticleLike on Articles.ArticleID = RefArticleLike.ArticleID
                        where Articles.ApprovedFlag = 'T' and Articles.ArticleID = ". $article_id);
                $row = $query->row_array();

                if (isset($row))
                {
                        return $CI->articles->populate_detail_article($row);
                }
                return null;
        }

        //get the first 20 comments for an article
        public function get_first_twenty_comments($id){

        }

        //get all the comments
        public function get_all_comments($id){

        }

        // when user do a publish function for upload an entry
        public function upload_entry()
        {
                
                //$this->db->insert('Articles', $this);
        }

        //when the super user do some edit and then approved the article
        public function approve_entry()
        {
                

                //$this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}