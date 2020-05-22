<?php

// command-line only
if (php_sapi_name() !== 'cli') {
	exit;
}

require 'conf.php';

$pdo = new PDO("$type:host=$host;dbname=$db", $user, $pass);

$st = $pdo->query("SELECT * FROM reports;");
$results = $st->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $r) {
	echo "===== ${r['id']} =====\n\n\n";
	print_r(json_decode($r['report'], true));
	echo "\n\n";
}
