<?php
$error_ref = "";
$error_lib = "";

// Outer if block: Check if all GET parameters are set
if (isset($_GET['ref']) && isset($_GET['lib']) && isset($_GET['prix']) && isset($_GET['qt']) && isset($_GET['four']) && isset($_GET['pv'])) {
    $ref = $_GET['ref'];
    $lib = $_GET['lib'];
    $qt = $_GET['qt'];
    $four = $_GET['four'];
    $pv = $_GET['pv'];
    $prix = $_GET['prix'];

    // Inner if block: Check if ref and lib are not empty
    if (!empty($ref) && !empty($lib)) {
        echo "<h1>Description article</h1>";
        echo "<ul><li>Réference:$ref</li><li>Libéllé:$lib</li><li>Prix:$prix</li><li>Quantité:$qt</li>";
        echo "<li>Liste des fournisseurs<ul>";
        foreach ($four as $f) {
            echo "<li>$f</li>";
        }
        echo "</ul></li>";
        echo "<li>Liste des point de vente<ul>";
        foreach ($pv as $pve) {
            echo "<li>$pve</li>";
        }
        echo "</ul></li>";
    } // This closes the inner if block
    else {
        // Set error messages if ref or lib is empty
        if (empty($ref)) $error_ref = "la réference ne doit pas etre vide";
        if (empty($lib)) $error_lib = "le libellé ne doit pas etre vide";
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <h1>Nouvel Article</h1>
            <form action="" method="get">
                <label for="ref">Référence</label>
                <input type="text" name="ref" value="<?= $ref ?>"><?= "<span style='color:red;'>$error_ref</span>" ?><br>
                <label for="lib">Libéllé</label>
                <input type="text" name="lib"><?= $error_lib ?><br>
                <label for="prix">Prix</label>
                <input type="text" name="prix"><br>
                <label for="qt">Quantité</label>
                <input type="text" name="qt"><br>
                <label for="four">Fournisseur</label>
                <select name="four[]" multiple>
                    <option value="f1">Fournisseur1</option>
                    <option value="f2">Fournisseur2</option>
                    <option value="f3">Fournisseur3</option>
                </select><br>
                <label for="pv">Point de vente</label><br>
                <input type="checkbox" name="pv[]" value="sfax">Sfax<br>
                <input type="checkbox" name="pv[]" value="sousse">Sousse<br>
                <input type="checkbox" name="pv[]" value="tunis">Tunis<br>
                <input type="submit" value="Envoyer">
            </form>
        </body>
        </html>
        <?php
    } // This closes the else block
} // This closes the outer if block
else {
    // Outer else block: Display the form for the first time
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Nouvel Article</h1>
        <form action="" method="get">
            <label for="ref">Référence</label>
            <input type="text" name="ref"><br>
            <label for="lib">Libéllé</label>
            <input type="text" name="lib"><br>
            <label for="prix">Prix</label>
            <input type="text" name="prix"><br>
            <label for="qt">Quantité</label>
            <input type="text" name="qt"><br>
            <label for="four">Fournisseur</label>
            <select name="four[]" multiple>
                <option value="f1">Fournisseur1</option>
                <option value="f2">Fournisseur2</option>
                <option value="f3">Fournisseur3</option>
            </select><br>
            <label for="pv">Point de vente</label><br>
            <input type="checkbox" name="pv[]" value="sfax">Sfax<br>
            <input type="checkbox" name="pv[]" value="sousse">Sousse<br>
            <input type="checkbox" name="pv[]" value="tunis">Tunis<br>
            <input type="submit" value="Envoyer">
        </form>
    </body>
    </html>
    <?php
} // This closes the outer else block
?>





