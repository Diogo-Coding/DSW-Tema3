<?php 
    @$link = new mysqli('db', 'root', 'test', 'world');
    $error = $link->connect_errno;
    if($error != null){
        echo "<p>El error $error dice: $link->connect_error </p>";
        die();
    }
    $country = $_POST['countries'];
    $code = $_POST['Code'];
        echo "<h1>Cities of " . $country . "</h1>";
        echo "<form action='result.php' method='POST'>";
        echo "<select name='cities'>";

    $sql = "Select * FROM city WHERE CountryCode = '" . $code. "'";
    $result = $link->query($sql);
    $row = $result->fetch_array();
    while ($row != null){
        echo "<option value='" . $row['Name'] . $row['Name'] . ">" . $row['Name'] . "</option>";
    $row = $result->fetch_array();
    }
    $result->close();

        echo "</select>";
        echo "<input type='submit' value='Enviar'>";
        echo "</form>";

    $link->close();
?>