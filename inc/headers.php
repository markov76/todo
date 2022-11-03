<?php

header('Access-Control-Allow-Origin: http://localhost:3001');
header('Access-Control-Allow-Headers: Accept,Content-Type','Access-Control-Allow-Header');
header('Content-Type: application/json');
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS');
header('Access-Control-Max-Age: 3600');


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    return 0;
}