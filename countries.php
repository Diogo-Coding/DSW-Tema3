<?php 
    @$link = new mysqli('db', 'root', 'test', 'world');
    $error = $link->connect_errno;
    if($error != null){
        echo "<p>El error $error dice: $link->connect_error </p>";
        die();
    }
    $continent = $_POST['continents'];
        echo "<h1>Countries of " . $continent . "</h1>";
        echo "<form action='cities.php' method='POST'>";
        echo "<select name='countries'>";

    $sql = "Select * FROM country WHERE continent = '" . $continent. "'";
    $result = $link->query($sql);
    $row = $result->fetch_array();
    while ($row != null){
        echo "<option value='" . $row['Name'] .  " id=" . $row['Name'] . ">" . $row['Name'] . "</option>";
    $row = $result->fetch_array();
    }
    $result->close();

        echo "</select>";
        echo "<input type='submit' value='Enviar'>";
        echo "</form>";

    $link->close();
?>