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
    <title>Cities</title>
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
    <h1>Cities of the World</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country Code</th>
                <th>District</th>
                <th>Population</th>
            </tr>
        </thead>
        <tbody>
<?php
    $limit = "";
    if (isset($_GET['n'])) {
        $limit = "LIMIT " .  $_GET['n'];
    }
    $sql = "Select * FROM city " . $limit;
    $result = $link->query($sql);
    $row = $result->fetch_array();
    while ($row != null){
?>
        <tr>
            <td><?=$row['ID']?></td>
            <td><?=$row['Name']?></td>
            <td><a href="country.php?p=<?=$row['CountryCode']?>"><?=$row['CountryCode']?></a></td>
            <td><?=$row['District']?></td>
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