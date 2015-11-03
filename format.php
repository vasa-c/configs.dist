#!/usr/bin/env php
<?php

if (!isset($_SERVER['argv'][1])) {
    echo 'Format: ./format.php filename'.PHP_EOL;
    exit();
}

$fn = $_SERVER['argv'][1];

if (!is_file($fn)) {
    echo $fn.' is not found'.PHP_EOL;
    exit();
}

if ((!is_readable($fn)) || (!is_writable($fn))) {
    echo 'Premission denied for '.$fn.PHP_EOL;
}

$result = [];
$edited = false;

foreach (file($fn) as $n => $line) {
    $trimmed = rtrim($line)."\n";
    $result[] = $trimmed;    
    if ($trimmed !== $line) {
        $edited = true;
        echo ($n + 1).' trim'.PHP_EOL;        
    }
}

if ($edited) {
    file_put_contents($fn, implode('', $result));
}

