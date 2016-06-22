<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
      
      <style>
        body {word-wrap: break-word;font-family: "Open Sans", sans-serif;}
          span{margin: 10px;}
     </style>

</head>
<body>
    <?

require_once 'init.php';


$servername = "db624747361.db.1and1.com";
$username = "dbo624747361";
$password = "tomates";
$dbname = "db624747361";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query("SET NAMES 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM Producto WHERE vendidos >= 1 ORDER BY 'id' ASC";
      $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      
        $codigoPHP = '<tr>
            <td><span>'.$row["IDProductor"].'</span></td>
            <td><span>'.$row["Nombre"].'</span></td>
            <td><span>'.$row["Unidad"].'</span></td>
            <td><span></span>'.$row["Stock"].'</td>
           <td ><span>'.$row["vendidos"].'</span></td>
        </tr>'.$codigoPHP;

    }
            echo '<table style="margin: 0 auto;">
                    <thead>
                      <tr><th data-field="idp">IDProductor</th>
                          <th data-field="PRODUCTO">Producto</th>
                          <th data-field="PRODUCTO">Unidad</th>
                          <th data-field="STOCK">Stock</th>
                          <th data-field="VENDIDOS">Vendidos</th>
                      </tr>
                    </thead>
                    '.$codigoPHP.'
                    </tbody>
                </table><br/><br/>';
        
    ?>
    
    </body>
</html>