<?php
    @$link = new mysqli('db', 'root', 'test', 'world');
    $error = $link->connect_errno;
    if($error != null){
        echo "<p>El error $error dice: $link->connect_error </p>";
        die();
    }
    $country = $_POST['countries'];
        echo "<h1>Cities of " . $country . "</h1>";
        echo "<form action='result.php' method='POST'>";
        echo "<select name='cities'>";

    $sql = "Select * FROM city WHERE CountryCode = '" . $country. "'";
    $result = $link->query($sql);
    $row = $result->fetch_array();
    while ($row != null){
        echo "<option value='" . $row['Name'] .  "' id=" . $row['Name'] . ">" . $row['Name'] . "</option>";
        $code = $row['CountryCode'];
    $row = $result->fetch_array();
    }
    $result->close();

        echo "</select>";
        echo "<input type='submit' value='Enviar'>";
        echo "<input type='hidden' value='$code' name='countrycode'>";
        echo "</form>";

    $link->close();
?>