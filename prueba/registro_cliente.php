<?php require_once('Connections/conex.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


/* 
///cargar imagenes 
if(($_FILES['foto_productor']['tmp_name'])!=""){

$rutaEnServidor='img_productors';
$rutaTemporal=$_FILES['foto_productor']['tmp_name'];
$nombreImagen=$_FILES['foto_productor']['name'];
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;


	move_uploaded_file($rutaTemporal, $rutaDestino);
///// hasta aqui

*/

    
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    
  if($_POST['password']==$_POST['password2']){  /// contraseñas iguales

      $contra= $_POST['password'];
        $pass = md5($contra);  
        
      $insertSQL = sprintf("INSERT INTO usuarios (id, user, password, email) VALUES (%s, %s, %s, %s)",
                           GetSQLValueString($_POST['id'], "int"),
                           GetSQLValueString($_POST['user'], "text"),
                           GetSQLValueString($pass, "text"),
                           GetSQLValueString($_POST['email'], "text"));

      mysql_select_db($database_conex, $conex);
      $Result1 = mysql_query($insertSQL, $conex) or die(mysql_error());

            echo "<script>alert('Registro exitoso!');window.location='reg_cliente.html';</script>";

    }else{
        
        echo "<script>alert('Las contraseñas no coinciden, favor de revisar.');window.location='reg_cliente.html';</script>";

    }
}


?>