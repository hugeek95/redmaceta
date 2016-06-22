<?php

session_start();

//Composer's autoloader
require_once 'vendor/autoload.php';

$_SESSION['user_id'] = 1;

$stripe = [
    'publishable' => 'pk_live_7zVF7HnpsFQsamuOlZCKMruB',
    'private' => 'sk_live_KVPID0DFpZPoRfkzYzi18PkJ'
];

Stripe::setApiKey($stripe['private']);

$db= new PDO(

//    'mysql:host=db624747361.db.1and1.com;
//dbname=db624747361', 'dbo624747361', 'tomates');
'mysql:host=localhost;
dbname=redmaceta', 'root', '');

    $userQuery = $db -> prepare("
        SELECT id, username, email, premium
        FROM users
        WHERE id = :user_id
    ");


$userQuery -> execute(['user_id' => $_SESSION['user_id']]);

    $user= $userQuery -> fetchObject();


?>
