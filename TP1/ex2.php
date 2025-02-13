<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <tr><th>nom</th><th>moyenne</th></tr>
  
    
<?php
  require("util.php");
foreach ($tab as $n => $m) {
    $c=colormoy($m);
    echo("<tr><td>$n</td> <td style=background-color:$c>$m</td></tr>");
  
}




   
    ?>
    </table>
 
  
</body>
</html>