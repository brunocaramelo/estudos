<?php

require '../../../../../autoload/autoload.php';


$connection = new ConnectionFactory();

$connection->getConnection();
//$select = ''

die(var_dump($connection));