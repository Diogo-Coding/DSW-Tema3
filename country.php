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
    <title>Country</title>
    <style>
        table {
            border-collapse: collapse;
            text-align: center;
        }
        th {
            background-color: navy;
            color: white;
        }
        td,th {
            border: 1px solid navy;
            padding: 2px 8px;
        }
        td:nth-child(5){
            text-align: right;
        }

        tr:nth-child(odd){
            background-color: gainsboro;
        }
    </style>
</head>

<body>
    <h1>Countries of the World</h1>
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Continent</th>
                <th>Region</th>
                <th>SurfaceArea</th>
                <th>Population</th>
            </tr>
        </thead>
        <tbody>
<?php
    $code = "";
    if (isset($_GET['p'])) {
        $code = " WHERE Code = '" .  $_GET['p'] . "'";
    }
    $sql = "Select * FROM country" . $code . " LIMIT 10";
    $result = $link->query($sql);
    $row = $result->fetch_array();
    while ($row != null){
?>
        <tr>
            <td><?=$row['Code']?></td>
            <td><?=$row['Name']?></td>
            <td><?=$row['Continent']?></td>
            <td><?=$row['Region']?></td>
            <td><?=$row['SurfaceArea']?></td>
            <td><?=$row['Population']?></td>
        </tr>
<?php
    $row = $result->fetch_array();
    }
    $result->close();
?>
        </tbody>
    </table>
    <?php 

    ?>
</body>

</html>
<?php 
    $link->close();
?>