<?php
    class PostsGateway extends TableGateway{
        //constructor to instantiate object
        public function __construct($connection){
            parent::__construct($connection);
            
        }
        
        public function getOrderFields(){
            return 'PostID';
        }
        public function getPrimaryKeyName(){
            return 'PostID';
        }
        public function getTableName(){
            return 'Posts';
        }
        public function getBrowsePostsStatement(){
            return 'Select p1.PostID, p1.UserID, p1.Message, p1.Title, date(p1.PostTime) PostTime, u.FirstName, u.LastName, i.Path FROM Posts p1, Users u, ImageDetails i, PostImages p2 WHERE p1.PostID = p2.PostID AND i.ImageID = p1.MainPostImage AND p1.UserID = u.UserID Group by p1.PostID';
        }
        public function getPostDataStatement(){
            return "SELECT p1.PostID, p1.UserID, p1.MainPostImage, p1.Title, p1.Message, date(p1.PostTime) PostTime, u.FirstName, u.LastName, i.Path FROM Posts p1, Users u, ImageDetails i, PostImages p2 WHERE p1.PostID = p2.PostID AND i.ImageID = p1.MainPostImage AND p1.UserID = u.UserID AND p1.PostID = :id";
        }
        public function getRelatedPicStatement(){
            return "SELECT i.Path, i.ImageID FROM ImageDetails i, PostImages p WHERE p.ImageID = i.ImageID AND p.PostID = :id";
        }
    }
?>