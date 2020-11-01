<?php
include_once "./def.php";
include "./core/DB.php";
include "./core/admission.php";

use Core\Data\DB;
use Core\Data\admission;

header('Content-type: application/json');

$db = new Database();
$updateEntry = new event($db->connect());

$updateEntry->fname=$_GET['sname']; 
$updateEntry->mobile=$_GET['mobile'];
$updateEntry->email=$_GET['email'];
$updateEntry->standard=$_GET['standard']; 


$response = array(
    "status" => "Failed",
    "message" => "Error in updating the  record"
);

if ( $updateEntry->update() > 0 ) {
    $response['status'] = "Success";
    $response['message'] = "Record Updated";
}

echo json_encode($response);

?>