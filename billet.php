<?php
require 'header.php';
require_once 'vendor/autoload.php';


$commands = $db->query('SELECT * FROM commands');

$command = $commands->lastInsertId();

var_dump($command);



?>


<?php

?>




