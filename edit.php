<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer</title>
</head>
<body>

<?php 
  
  
try {
    require_once("db.php");
    $id=$_GET['id']+1;
    $sql = "SELECT * from posts where id='$id' ";
    $stmt= $cnx->query($sql);
    $stmt->execute(array('post_title', 'description','post_at'));

    
    while ($row= $stmt->fetch()) {
        $title = $row['post_title'];
        $description = $row['description'];
        $date = $row['post_at'];
    }
    $stmt->closeCursor();
    


} catch (Exception $ex) {
    die('Erreur : '.$ex->getmessage());
    }


if (isset($_GET['valider'])) {
    try {
        require_once("db.php");
        
     
        $ModifierArticle="UPDATE posts SET post_title ='$title',description='$description',post_at ='$date' WHERE id='$id'";
  
        $newp=$cnx->prepare($ModifierArticle);
        $newp->execute();
     
  
        } catch (Exception $ex) {
        die('Erreur : '.$ex->getmessage());
        }
        header('location:index.php');
    }
?>
        
<h1> Editer un article </h1>
<div class="row">
    <div class="col-12 col-md-6">
        <form action="" method="get">
            <div class="form-group">
                <label for="title">Title </label>
                <input type="text" name="title" id="title"  value="<?= @$title?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description </label>
                <input type="text" name="description" id="description" value="<?= @$description?>" required>
            </div>
            <div class="form-group">
                <label for="date">Date </label>
                <input type="date" name="date" id="date" value="<?= @$date?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Save" name="valider">
            </div>
        </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
