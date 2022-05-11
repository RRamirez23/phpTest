<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="get">
    <input type="text" name="person">
    <button>Submit</button>
</form>
    
    <?php

    //comments are the same as in js
    $name = $_GET['person'];
    echo $name;
    echo " is ".strlen($name)." letters long ";

    echo str_word_count("this string has ");
    echo strrev(" this string is backwards");
    print strpos(" this string is very long", "very");
    
    echo str_replace(" Daniel", "Jason", "Daniel was here");

    $myarr = array(1,2,3);
    echo $myarr['1'];

    //xor operator only proceeds if only one of the statements in the comparison is true



    
    ?>

    <a href="calculator.php">calculator</a>
    
</body>
</html>