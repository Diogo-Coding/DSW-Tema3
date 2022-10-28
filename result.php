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
    <?php
        @$link = new mysqli('db', 'root', 'test', 'world');
        $error = $link->connect_errno;
        if($error != null){
            echo "<p>El error $error dice: $link->connect_error </p>";
            die();
        }
        $citie = $_POST['cities'];
        $countryCode = $_POST['countrycode'];

        $sql = "Select * FROM city WHERE Name = '" . $citie. "' && CountryCode = '" . $countryCode . "';";
        $result = $link->query($sql);
        $row = $result->fetch_array();
        while($row != null){
        echo "<h3>La ciudad [ " . $row['Name'] . " ] del pais [" . $row['CountryCode'] . "] tiene una poblacion de ---> " . $row['Population'] . "</h3>";
        ?>
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
                <tr>
                    <td><?=$row['ID']?></td>
                    <td><?=$row['Name']?></td>
                    <td><a href="country.php?p=<?=$row['CountryCode']?>"><?=$row['CountryCode']?></a></td>
                    <td><?=$row['District']?></td>
                    <td><?=$row['Population']?></td>
                </tr>
            </tbody>
        </table>
        <p>- Mas info del pais en <strong><a href="country.php?p=<?=$row['CountryCode']?>"><?=$row['CountryCode']?></a></strong></p>
        <?php
        $row = $result->fetch_array();
        }
        $result->close();
        $link->close();
    ?>
</body>
</html>