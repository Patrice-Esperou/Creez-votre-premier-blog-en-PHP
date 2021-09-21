<?php
namespace PatriceEsperou\Blog\Model;

require_once("model/Manager.php");


class ModifyManager extends Manager 
{
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, author, createdAt FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postmodify($author, $title, $content)
    {
         $db = $this->dbConnect();
         $req = $db->prepare('UPDATE posts SET author = ?, title = ?, content = ? WHERE id = ?');
         $req->execute(array($postId, $title, $content, $author));
         $updatedModify = $req->fetch();
         return $updatedModify;
    }
}

