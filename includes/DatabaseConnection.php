<?php
$pdo = new PDO('mysql:host=localhost;dbname=xfood;charset=utf8', 'ijdb_sample', 'mypassword');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);