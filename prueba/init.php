<?php

session_start();

//Composer's autoloader
require_once 'vendor/autoload.php';

$_SESSION['user_id'] = 1;

$stripe = [
    'publishable' => 'pk_test_7Hli1EdDwN0BMP3VI4t4Ytzb',
    'private' => 'sk_test_a0Wiu8LNiKe6XpwhHkgY8k5b'
];

Stripe::setApiKey($stripe['private']);

$db= new PDO(

    'mysql:host=db624747361.db.1and1.com;
dbname=db624747361', 'dbo624747361', 'tomates'); 

 
    $userQuery = $db -> prepare(" 
        SELECT id, username, email, premium
        FROM users
        WHERE id = :user_id
    ");


$userQuery -> execute(['user_id' => $_SESSION['user_id']]);

    $user= $userQuery -> fetchObject();

    
?>