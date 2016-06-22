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

    $consul = "SELECT * FROM `bolsa` WHERE `pago`= 1 ORDER BY `id` ASC";
    $result2 = mysqli_query($conn, $consul);
    while($row2 = mysqli_fetch_assoc($result2))
    {   ////Creamos una lista con toooodos los productos y sus cantidades
            $products .= $row2['products'].',';
            $quants .= $row2['quants'].',';
    }

        	//Creamos los dos arreglos separados
        	$ids = explode(',',$products);
        	$cants = explode(',',$quants);

        	$idslenght = count($ids);

          $codigoPHP ="";

        for ($i=0; $i < $idslenght; $i++) {
        	$stmt = $db->query('SELECT * FROM Producto WHERE id ='.$ids[$i]);
        	$db->query("SET NAMES 'utf8'");
        	$row = $stmt->fetch(PDO::FETCH_ASSOC);

            $codigoPHP = '<tr>
        		<td><span>'.$row["Nombre"].'</span></td>
        		<td>'.$row["Unidad"].'(s)</td>
        		<td>'.$cants[$i].'</td>
            <td >'.$row["IDProductor"].'</td>
        	  </tr>'.$codigoPHP;

        }
                echo '
                    <table style="margin: 0 auto;">
                        <thead>
                          <tr>
                              <th data-field="nombre">Nombre</th>
                              <th data-field="unidad">Unidad</th>
                              <th data-field="cantidad">Cantidad</th>
                               <th data-field="precio">IDProductor</th>
                          </tr>
                        </thead>
                        '.$codigoPHP.'
                        </tbody>
                    </table><br/><br/>';
    ?>

    </body>
</html>
