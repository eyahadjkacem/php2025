
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Nouvel Article</h1>
<form action="../control/articleControl.php" method="get">
    <label for="ref">Référence</label>
    <input type="text" name="ref" value=<?php if(isset($_GET['ref'])) echo $_GET['ref']; ?>><br>
    <label for="lib">Libéllé</label>
    <input type="text" name="lib" value=<?php if(isset($_GET['lib'])) echo $_GET['lib']; ?>><br>
    <label for="prix">Prix</label>
    <input type="text" name="prix" value=<?php if(isset($_GET['prix'])) echo $_GET['prix']; ?>><br>
    <label for="qt">Quantité</label>
    <input type="text" name="qt" value=<?php if(isset($_GET['qt'])) echo $_GET['qt']; ?>><br>
    <label for="four">Fournisseur</label>
    <select name="four[]" multiple>
        <?php
        //include("../model/Fournisseur.php");
                //$four=Fournisseur::getAll();
                foreach($fournisseur as $f){
                    echo "<option value=".$f->id ;
                
                    if(isset ($_GET[$f->id])) echo " selected";
                    echo " >".$f->nom."</option>";
                }
        ?>

    </select><br>

    <input type="submit" name='add' value="Ajouter">
    <input type="submit" name='up' value="Modifier">
    <input type="submit" name='del' value="Supprimer">

</form>
<h1>Liste des articles</h1>
<form action="../control/articleControl.php" method="get">
    <label for="ref">Référence: </label>
    <input type="text" name="ref">
    <label for="lib">Libellé: </label>
    <input type="text" name="lib">
    <label for="p1">prix min: </label>
    <input type="text" name="p1">
    <label for="p2">Prix max: </label>
    <input type="text" name="p2">
    <label for="q1">Qt min: </label>
    <input type="text" name="q1">
    <label for="q2">Qt max: </label>
    <input type="text" name="q2">
    <input type="submit" value="Rechrcher" name=search>
</form>
<table border=1>
    <tr><th>Reférence</th><th>Libellé</th><th>Prix</th><th>Quantité</th><th>Fournisseur</th></tr>
<?php
        //include("../model/Article.php");
                //$artList=Article::getAll();
                foreach($artList as $a)
                    echo $a;
        ?>
</table>
</body>
</html>