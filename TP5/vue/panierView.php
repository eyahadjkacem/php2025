<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Liste des article dans le panier</h1>

    <?php
    if(isset($_SESSION['login']))
        echo "<h3>Bonjour ".$_SESSION['login']."</h3>";
    else
        header("location:UserForm.html");
    echo $p;
    ?>
</body>
</html>