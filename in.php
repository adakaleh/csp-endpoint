<?php

if ($_SERVER["CONTENT_TYPE"] !== 'application/csp-report') {
	exit;
}

require 'conf.php';

$pdo = new PDO("$type:host=$host;dbname=$db", $user, $pass);

$payload = file_get_contents('php://input');

// insert
$st = $pdo->prepare('INSERT INTO reports (report) VALUES (?)');
$st->execute([$payload]);
