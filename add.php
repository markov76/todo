<?php
header('Access-Control-Allow-Origin: http:/localhost:3000');
header('Access-Control-Allow-headers: Accept,Content-Type','Access-Control-Allow-Header');
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    return 0;
}

$input = json_decode(file_get_contents('php://input'));
$description = filter_var($input->description,FILTER_UNSAFE_RAW);


try {
    $db = new PDO('mysql:host=localhost;dbname=todo;charcet=utf8','root', '');
    $dp->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $query = $db->prepare('insert into task(description) values (:description)');
    $query->bindValue(':description',$description,PDO::PARAM_STR);
    $query->execute();

    
    header('HTTP/1.1 200 OK');
    $data array('id' => $db->lastInsertId(),'description' => $description);
    print json_encode($result);
} catch (PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error'=>$pdoex->getMessage());
    print json_encode($error);
}