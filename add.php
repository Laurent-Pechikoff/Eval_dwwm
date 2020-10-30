<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>
<body>

<?php
if ($_POST) {
    try {
        require_once("db.php");
        if($cnx) echo "CONNEXION OK<br>";
        @$title = $_POST['title'];
        @$description = $_POST['description'];
        @$date = $_POST['date'];
        $sql = "INSERT INTO posts (post_title, description, post_at) VALUES('$title','$description','$date')";
        $cnx->exec($sql);

    } catch (Exception $e) {
        die('Erreur : '.$e->getmessage());
    }
    header('location:index.php');
}

?>
<h1> Ajouter un article </h1>
<div class="row">
    <div class="col-12 col-md-6">
        <form action="" method="post">
            <div class="form-group">
                <label for="title">Title </label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description </label>
                <input type="text" name="description" id="description"  required>
            </div>
            <div class="form-group">
                <label for="date">Date </label>
                <input type="date" name="date" id="date" required>
            </div>
            <div class="form-group">
            <a href="add.php"> <input type="submit" value="Add"></a>
            </div>
        </form>
    </div>
</div>
<a href="index.php"><input type="button" value="Retour a accueil"></a>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>