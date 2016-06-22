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
    while($row2 = mysqli_fetch_assoc($result2)){   //// WHILE PAGADOS
    
$sql = "SELECT * FROM bolsa WHERE id =".$row2["id"];
      $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
            $quants= $row['quants'];
            $products = $row['products'];
    }
    
	//Creamos los dos arreglos separados
	$ids = explode(',',$products);
	$cants = explode(',',$quants);

	$idslenght = count($ids);

$codigoPHP ="";

	$total=0;
	for ($i=0; $i < $idslenght; $i++) {
		$stmt = $db->query('SELECT * FROM Producto WHERE id ='.$ids[$i]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$precio[$i] = $row['Precio'];
        
		$importe = $precio[$i]*$cants[$i];
		$total = $total+$importe;
	}
    
for ($i=0; $i < $idslenght; $i++) {
	$stmt = $db->query('SELECT * FROM Producto WHERE id ='.$ids[$i]);
	$db->query("SET NAMES 'utf8'");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
    
/* $copia = $db->query('SELECT * FROM productors WHERE id ='.$row["IDProductor"]);
	$db->query("SET NAMES 'utf8'");
	$rowcopia = $copia->fetch(PDO::FETCH_ASSOC);
 */   
 
        
        /*$vendidos= $cants[$i] + $row["vendidos"];
       //$vendidos=0;
        
        $db->query('
			UPDATE Producto
			SET vendidos = "'.$vendidos.'"
			WHERE id ='.$ids[$i]);
*/
    
    
   $price = $precio[$i]*$cants[$i];
    
    $codigoPHP = '<tr>
    		<td><span><img src="imgs/cat/'.$row["Categoria"].'.png" width="20px" height="auto"></span></td>
		<td><span>'.$row["Nombre"].'</span></td>
		<td><span></span>'.$row["Unidad"].'(s)</td>
		<td><span>'.$cants[$i].'</td>
		<td >$ <span>'.$price.'</span> MXN</td>
       <td ><span>'.$row["IDProductor"].'</span></td>
	</tr>'.$codigoPHP;
    
 
}
        echo '<table style="margin: 0 auto;">
                <thead>
                  <tr>
                   
                      <th data-field="cantidad">Token</th>
                      <th data-field="cantidad">Email</th>
                      <th data-field="precio">Total</th>
                  </tr>
                </thead>
                <tr>
                    <td><span>'.$row2["token"].'</span></td>
                    <td><span></span>'.$row2["email"].'</td>
                       <td><span></span>'.$row2["total"].'</td>
                </tr>
                </tbody>
            </table>
            
            <table style="margin: 0 auto;">
                <thead>
                  <tr>
                  <th data-field="cantidad">Categoria</th>
                      <th data-field="nombre" class="hide-on-small-only">Nombre</th>
                      <th data-field="cantidad">Unidad</th>
                      <th data-field="cantidad">Cantidad</th>
                      <th data-field="precio">Precio</th>
                       <th data-field="precio">IDProductor</th>
                  </tr>
                </thead>
                '.$codigoPHP.'
                </tbody>
            </table><br/><br/>';
        
    }  ///  FIN DE WHILE
    ?>
    
    </body>
</html>