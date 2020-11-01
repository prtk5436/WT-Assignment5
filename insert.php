<?php
include_once './def.php';
include "./core/DB.php";
include "./core/admission.php";

use Core\Data\DB;
use Core\Data\admission;


$db = new DB();
$insert_entry = new admission($db->connect());

$insert_entry->sname=$_GET['sname'] ?? null ; 
$insert_entry->mobile=$_GET['mobile'] ?? null ;
$insert_entry->email=$_GET['email'] ?? null ;
$insert_entry->standard=$_GET['standard'] ?? null ;
$insert_entry->gender=$_GET['gender'] ?? null ; 
$insert_entry->hobby=$_GET['hobby'] ?? null ;

$response = array(
    "status" => "Failed",
    "data" => "Error in inserting the record"
);
;
if ($insert_entry->insertRec() > 0) {
    $response['status'] = "Success";
    $response['data'] = "Your data inserted sucessfully!!";
}

return $response['status'];


?>