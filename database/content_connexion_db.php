<?php
$host = 'localhost';
$db = 'bistrot';
$user = 'root';
$pw = 'admin';

try {
    $bdd= new PDO ("mysql:dbname=$db; host=$host; charset=utf8", $user, $pw);
    echo 'connecté';
}catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
};

