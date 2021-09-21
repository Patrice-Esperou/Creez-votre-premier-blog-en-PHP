<?php
namespace PatriceEsperou\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
         $comments = $db->prepare('SELECT id, pseudo, comment_unique, comment_date FROM comments where post_id = ? ORDER BY comment_date DESC');
         $comments->execute(array($postId));

         return $comments;
    }

    public function postComment($postId, $pseudo, $comment_unique)
    {
         $db = $this->dbConnect();
         $comments = $db->prepare('INSERT INTO comments(post_id, pseudo, comment_unique, comment_date)
        VALUE(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $pseudo, $comment_unique));

        return $affecteLines;
    }
}

