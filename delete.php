<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer</title>
</head>
<body>
<?php 
if ($_GET){
    try {
        require_once("db.php");
        $id=$_GET["id"]+1;        
        $sql = "DELETE FROM posts WHERE id = '$id'";
        $data = $cnx->exec($sql);


    } catch (Exception $ex) {
        die('Erreur : '.$ex->getmessage());
    }

    header('location:index.php');
}
?>
</body>
</html>