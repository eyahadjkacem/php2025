<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_GET['ref'])){
            header("location:../control/articleControl.php");
        }
        $ref=$_GET['ref'];
    ?>
    <h1> Qantité à commander pour l'article <?=$ref?></h1>
<form action="../control/panierControl.php" method="get">
    <input type="text" name="ref" value=<?=$ref?>><br>
    Qt à commander<input type="text" name="qt" id=""><br>
    <input type="submit" value="Ajouter">
</form>
</body>
</html>