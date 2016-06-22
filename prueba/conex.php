<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conex = "db624747361.db.1and1.com";
$database_conex = "db624747361";
$username_conex = "dbo624747361";
$password_conex = "tomates";
$conex = mysql_pconnect($hostname_conex, $username_conex, $password_conex) or trigger_error(mysql_error(),E_USER_ERROR); 
?>