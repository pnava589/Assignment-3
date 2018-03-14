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
            return 'Select p1.PostID, p1.UserID, p1.Message, p1.Title, p1.PostTime, u.FirstName, u.LastName, i.Path FROM Posts p1, Users u, ImageDetails i, PostImages p2 WHERE p1.PostID = p2.PostID AND i.ImageID = p2.ImageID AND p1.UserID = u.UserID Group by p1.PostID';
        }
    }
?>