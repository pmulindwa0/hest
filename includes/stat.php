<?php 

	require_once 'core/init.php';
	$account = new User();

	$std_counter = DB::getInstance()->query("SELECT COUNT(*) AS std_count FROM users WHERE active = 1 AND sex IN ('female', 'male')");

    $number = $std_counter->first()->std_count;
    $std_all_counter = DB::getInstance()->query("SELECT COUNT(*) AS std_count FROM users WHERE sex IN ('female', 'male')");

    $numberAll = $std_counter->first()->std_count;
