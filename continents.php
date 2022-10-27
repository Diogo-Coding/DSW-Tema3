<?php 
    @$link = new mysqli('db', 'root', 'test', 'world');
    $error = $link->connect_errno;
    if($error != null){
        echo "<p>El error $error dice: $link->connect_error </p>";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continents</title>
</head>
<body>

    <h1>Continents of the World</h1>

    <form action="countries.php" method="POST">
        <select name="continents">

    <?php
        $sql = "Select DISTINCT(Continent) FROM country";
        $result = $link->query($sql);
        $row = $result->fetch_array();
        while ($row != null){
        ?>

            <option value="<?=$row['Continent']?>" id="<?=$row['Continent']?>"><?=$row['Continent']?></option>

    <?php
        $row = $result->fetch_array();
        }
        $result->close();
        ?>

        </select>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
<?php 
    $link->close();
?>