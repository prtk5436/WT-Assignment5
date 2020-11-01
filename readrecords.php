<?php
include_once "./def.php";
include "./core/DB.php";
include "./core/admission.php";

use Core\Data\DB;
use Core\Data\admission;

header('Content-type: application/json');

$db = new DB();
$get = new admission($db->connect());

echo $get->getRecords();

?>