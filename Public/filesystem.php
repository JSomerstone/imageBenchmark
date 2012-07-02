<?php

include __DIR__.'/../autoloader.php';
echo '<a href="index.html">Back</a><hr/>';

$db = Core_DatabaseProvider::getInstanse();
$resultObj = $db->query('SELECT id, filename FROM image');

if($resultObj)
{
    while ($row = $resultObj->fetch_assoc())
    {
        echo '<img src="Img/', $row['filename'], '" alt="',  $row['filename'], '" \>', "\n";
    }
}
