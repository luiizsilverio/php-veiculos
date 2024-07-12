<?php

$host = "localhost";
$db = "padaria_kipao";
$user = "root";
$pass = "root";

$mysql = new mysqli($host, $user, $pass, $db);

if ($mysql->connect_errno) {
  die("Falha na conexão com o banco de dados");
} 

?>
