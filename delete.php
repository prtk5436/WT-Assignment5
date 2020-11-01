<?php
include_once "./def.php";
include "./core/DB.php";
include "./core/admission.php";

use Core\Data\DB;
use Core\Data\admission;

header('Content-type: application/json');

$db = new DB();
$deleteEntry = new admission($db->connect());

$deleteEntry->fname=$_GET['Studentname'];

$response = array(
    "status" => "Failed",
    "message" => "Error in deleting the  record"
);

if ( $deleteEntry->delete() > 0 ) {
    $response['status'] = "Success";
    $response['message'] = "Record Deleted Successfully";
}

echo json_encode($response);

?>