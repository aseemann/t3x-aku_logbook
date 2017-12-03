<?php
/**
 * Created by PhpStorm.
 * User: axelk
 * Date: 03.12.2017
 * Time: 12:28
 */

$testDir = __DIR__ . "/";

$autoload = $testDir . "../vendor/autoload.php";
if (false === file_exists($autoload)) {
    $autoload = $testDir . "../../../../vendor/autoload.php";
}
if (false === file_exists($autoload)) {
    $autoload = $testDir . "../../../../../vendor/autoload.php";
}