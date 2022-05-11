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
        <input type="text" name="num1" id="" placeholder="number 1">
        <input type="text" name="num2" id="" placeholder="number 2">
        <select name="operator" id="" >
            <option >Add</option>
            <option >Subtract</option>
            <option >Multiply</option>
            <option >Divide</option>
        </select>
    </br>
    <button type="submit" name="submit" value = "submit">Calculate</button>

    </form>

    <p>The answer is: </p>

    <?php
        if(isset($_GET['submit'])){
            $result1 = $_GET['num1'];
            $result2 = $_GET['num2'];
            $operator = $_GET['operator'];

            switch($operator){
                case "Add":
                    echo $result1 + $result2;
                    break;
                case "Subtract":
                    echo $result1 - $result2;
                    break;
                case "Multiply":
                    echo $result1 * $result2;
                    break;
                case "Divide":
                    echo $result1 / $result2;
                    break;

            }
        }
    ?>


<a href="index.php">index</a>

</body>
</html>