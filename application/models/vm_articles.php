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

        //get all articles order by Author ID
        public function get_all_articles_by_authorID($authorID){
                $CI =& get_instance();
                $CI->load->model('articles');
                $this->load->database();
                $query = $this->db->query("SELECT articles.*, refarticleauthor.authorID, count(refuserarticlecollection.userid) AS ShareNum, subtable.CommentID AS CommentNum, subtable3.likenum as LikeNum
                        FROM   (((articles JOIN refarticleauthor ON articles.ArticleID = refarticleauthor. articleid) JOIN refuserarticlecollection ON articles.ArticleID = refuserarticlecollection.ArticleID) JOIN (SELECT articles.ArticleID articleid, count(comments.CommentID) as commentID FROM articles JOIN comments ON articles.ArticleID = comments.ArticleID group by articles.ArticleID) as subtable ON subtable.articleid=articles.ArticleID) JOIN (SELECT articles.ArticleID articleid, count(refarticlelike.UserID) as likenum FROM articles JOIN refarticlelike ON articles.ArticleID = refarticlelike.ArticleID group by articles.ArticleID) as subtable3 ON subtable3.articleid=articles.ArticleID
                        WHERE refarticleauthor.authorID = " . $authorID . "
                        GROUP BY articleid");
                $all_articles = array();
                foreach ($query->result_array() as $row)
                {   
                        array_push($all_articles, $CI->articles->populate_home_article($row));  
                }
                return $all_articles;
        }

        //get all collected articles order by User ID
        public function get_all_collected_articles_by_userID($userID){
                $CI =& get_instance();
                $CI->load->model('articles');
                $this->load->database();
                $query = $this->db->query("SELECT d.*, ShareNum, CommentNum, LikeNum FROM (SELECT articles.ArticleID , count(articles.ArticleID) AS ShareNum from articles, refuserarticlecollection where articles.ArticleID=refuserarticlecollection.ArticleID GROUP BY articles.ArticleID) AS a, (SELECT articles.ArticleID , count(articles.ArticleID) AS CommentNum from articles, comments where articles.ArticleID=comments.ArticleID GROUP BY articles.ArticleID) AS b, (SELECT articles.ArticleID , count(articles.ArticleID) AS LikeNum from articles, refarticlelike where articles.ArticleID=refarticlelike.ArticleID GROUP BY articles.ArticleID) AS c, (SELECT articles.*, refuserarticlecollection.UserID from articles, refuserarticlecollection where articles.ArticleID=refuserarticlecollection.ArticleID AND refuserarticlecollection.UserID=".$userID.") AS d WHERE a.ArticleID = b.ArticleID AND b.ArticleID = c.ArticleID AND c.ArticleID = d.ArticleID");
                $collected_articles = array();
                foreach ($query->result_array() as $row)
                {   
                        array_push($collected_articles, $CI->articles->populate_home_article($row));  
                }
                return $collected_articles;
        }

        //get all liked articles order by User ID
        public function get_all_liked_articles_by_userID($userID){
                $CI =& get_instance();
                $CI->load->model('articles');
                $this->load->database();
                $query = $this->db->query("SELECT d.*, ShareNum, CommentNum, LikeNum FROM (SELECT articles.ArticleID , count(articles.ArticleID) AS ShareNum from articles, refuserarticlecollection where articles.ArticleID=refuserarticlecollection.ArticleID GROUP BY articles.ArticleID) AS a, (SELECT articles.ArticleID , count(articles.ArticleID) AS CommentNum from articles, comments where articles.ArticleID=comments.ArticleID GROUP BY articles.ArticleID) AS b, (SELECT articles.ArticleID , count(articles.ArticleID) AS LikeNum from articles, refarticlelike where articles.ArticleID=refarticlelike.ArticleID GROUP BY articles.ArticleID) AS c, (SELECT articles.*, refarticlelike.UserID from articles, refarticlelike where articles.ArticleID=refarticlelike.ArticleID AND refarticlelike.UserID=".$userID.") AS d WHERE a.ArticleID = b.ArticleID AND b.ArticleID = c.ArticleID AND c.ArticleID = d.ArticleID");
                $liked_articles = array();
                foreach ($query->result_array() as $row)
                {   
                        array_push($liked_articles, $CI->articles->populate_home_article($row));  
                }
                return $liked_articles;
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