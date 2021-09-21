<?php
require('controller/frontend.php');


try{
    if (isset($_GET['action'])){
        if ($_GET['action'] == 'listPosts'){
            listPosts();
        }
        elseif ($_GET['action'] == 'post'){
            if(isset($_GET['id']) && $_GET['id'] > 0){
               post();
            }
            else{
               throw new Exception('Erreur: aucun identifiant de blog envoyé');
            }
    
    }
    elseif($_GET['action'] == 'addComment'){
        if(isset($_GET['id']) && $_GET['id'] > 0) {
           if (!empty($_POST['pseudo']) && !empty($_POST['comment_unique'])){
               addComment($_GET['id'], $_POST['pseudo'], $_POST['comment_unique']);
           }
          
           else{
               throw new Exception('Erreur: aucun identifiant de blog envoyé: tous les champs ne sont pas remplis !');
           }
        }
        else{
            throw new Exception('Erreur: aucun identifiant de blog): aucun identifiant trouvé');
        }
        
    }
    elseif($_GET['action'] == 'modifyView'){
        if(isset($_GET['id']) && $_GET['id'] > 0){
           if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['content'])){
               addModify($_GET['id'], $_POST['author'], $_POST['content'], $_POST['title']);
           }
           else{
            throw new Exception('Erreur: aucun identifiant de blog envoyé: tous les champs ne sont pas remplis !');
        }
     }
     else{
         throw new Exception('Erreur: aucun identifiant de blog): aucun identifiant trouvé');
     }
     
 }
}else {
    listPosts();
   }
}
    catch(Exception $e) { // S'il y a eu une erreur, alors...
        echo 'Erreur : ' . $e->getMessage();
}


       
   




