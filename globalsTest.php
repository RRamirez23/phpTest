<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php



$x = 5;

function something(){
    $y = 10;

    echo $y;
    echo "</br>";
    echo $GLOBALS['x'];
    
 
}



something();
echo "</br>".$_POST['name'];

setcookie("name", "Daniel", time() - 1);

$_SESSION['name'] = "12";


?>


<form action="" method="POST">
    <input type="hidden" name="name" value="Daniel">
    <button type="submit">SUBMIT</button>
</form>

    
</body>
</html>