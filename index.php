<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

try {
    $db = new PDO('mysql:host=localhost;dbname=todo;charcet=utf8','root', '');
    $dp->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="select * from task";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results,JSON_PRETTY_PRINT);
    header('HTTP/1.1 200 OK');
    print $json;
} catch (PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error'=>$pdoex->getMessage());
    print json_encode($error);
}
