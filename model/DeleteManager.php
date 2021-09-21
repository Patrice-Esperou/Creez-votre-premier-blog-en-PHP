<?php
namespace PatriceEsperou\Blog\Model;

require_once("model/Manager.php");

class DeleteManager extends Manager
{
    public function getBlog($postId)
    {
        $db = $this->dbConnect();
        $blog = $db->prepare('SELECT * FROM posts WHERE id = ?');
        $blog->execute(array($postId));

        return $blog;
    }

    public function deleteBlog($postId, $title, $content, $author, $createdAt)
    {
        $db = $this->dbConnect();
        $deleteBlog = $db->prepare('DELETE FROM posts WHERE id = ?');
        $affectedLines = $deleteBlog->execute(array($postId, $title, $content, $author, $createdAt));

        return $affectedLines;
    }
}