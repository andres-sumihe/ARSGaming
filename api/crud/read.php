<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../objects/Stopwatch.php';
include_once '../../TxtDb.class.php';
  
// instantiate database and stopwatch object
$db = new TxtDb([
    'dir'      => '../../db/',
    'extension' => 'txtdb',
    'encrypt'   => false,
]);
// initialize object
if(isset($_GET["table"])){
    $tableName = $_GET["table"];
    $data = $db->select($tableName);
    if($data == null){
        http_response_code(404);
        echo "{message: table not found}" ;
    }else {
        http_response_code(200);
        echo json_encode($data);
    }
}else if(isset($_GET["waktu"]) && $_GET["waktu"]) {
    $tableName = $_GET["table"];
    $data = $db->select($tableName);
    if($data == null){
        http_response_code(404);
        echo "{message: table not found or wrong params}" ;
    }else {
        http_response_code(200);
        echo json_encode($data->waktu_mulai);
    }
}else {
    http_response_code(404);
    echo "{message: invalid request}";

}

?>