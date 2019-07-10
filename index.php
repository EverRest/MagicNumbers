<?php

require_once('MagicNumberClass.php');

if (!isset($_GET['first'])||(empty($_GET['first']))||(!isset($_GET['end'])||empty($_GET['end']))) die('Не вистачає вхідних параметрів.');

$checker = MagicNumberClass::getInstance();

$from = $_GET['first'];
$to = $_GET['end'];
$magicCount = 0;

if ((int) $from > (int) $to) {
    $tmp = $to;
    $to = $from;
    $from = $tmp;
}

for($i = (int) $from; $i < (int) $to; $i++) {
    if ($checker->checkIsMagic((string) $i)) ++$magicCount;
}

var_dump($magicCount);exit;