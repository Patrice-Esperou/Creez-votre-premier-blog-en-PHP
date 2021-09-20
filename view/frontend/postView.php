<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>


    <div class="blog" style="border: 1px solid black; width:45%;">
            <?php               
                echo '<h3>'. htmlspecialchars($post["author"]) . '  Le  ' . htmlspecialchars($post['createdAt']) . '</h3>';
                echo  '<p>'. htmlspecialchars($post['title']) . '</p>';  
                echo  '<p>'. htmlspecialchars($post['content']) . '</p>';                                          
            ?>                             
    </div>  
    <h2>Commentaires</h2>
    <br><br>
    <div class="com" style="border:2px solid red; width: 30%;">
            <?php
            while ($comment = $comments->fetch())
            {
               echo '<h3>'. htmlspecialchars($comment['pseudo']) . ' Le ' . htmlspecialchars($comment['comment_date']) . '</h3>';
               echo '<p>'.nl2br(htmlspecialchars($comment['comment_unique'])). '</p>';
            }
            ?>
    </div> 
    <form action="index.php?action=addComment&amp;id=<?=$post['id']?>" method="POST">
        <p>
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo"><br /><br> 

        <label for="comment_unique">votre commentaire</label>
        <textarea id="comment_unique" name="comment_unique"></textarea><br><br>
              
    
        <button style="color: white; background-color: green; margin-bottom: 10px;"type="submit" id="index.php?action=addComment&amp;id=<?=$post['id']?>">Publier votre commentaire </button>
	    </p>
    </form>


    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>            
            
   
