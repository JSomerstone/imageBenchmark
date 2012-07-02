<?php
include __DIR__ . '/../autoloader.php';


$requested = $_GET['img'];

$db = Core_DatabaseProvider::getInstanse();

$resultObj = $db->query(
    sprintf(
        'SELECT content from image where id = %d',
        mysql_real_escape_string($requested)
    )
);

if($resultObj)
{
    $row = $resultObj->fetch_assoc();
    header("Content-Type: image/gif");
    header("Content-Transfer-Encoding: binary");
    echo $row['content'];
}
