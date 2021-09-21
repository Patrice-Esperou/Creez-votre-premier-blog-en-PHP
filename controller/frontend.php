<?php //Controlleur

//charge les classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ModifyManager.php');

function listPosts()//Les blogs
{
    $PostManager = new \PatriceEsperou\Blog\Model\PostManager();//Création d'un objet
    $posts = $PostManager->getPosts();//Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()//Un blog
{
    $postManager = new \PatriceEsperou\Blog\Model\PostManager();
    $commentManager = new \PatriceEsperou\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $pseudo, $comment_unique)// Ajoute un commentaire
{
    $commentManager = new \PatriceEsperou\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $pseudo, $comment_unique);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function addModify($author, $title, $content)
{
    $modifyManager = new \PatriceEsperou\Blog\Model\ModifyManager();
    $affectedLines = $modifyManager->postModify($author, $title, $content);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le blog !');

        require('view/frontend/modifyView.php');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId );
    }
}