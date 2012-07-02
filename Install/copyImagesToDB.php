<?php
include __DIR__ . '/../autoloader.php';
define('NL', "\n");

$multiplier = 500;
$originals = glob('*.gif'); // get all .gif images fron current directory
$originalCount = count($originals);

$db = Core_DatabaseProvider::getInstanse();

for ($iterator = 0; $iterator < $multiplier ; $iterator++)
{
    foreach ($originals as $originalFile)
    {
        $fileName = md5($iterator . '_' . $originalFile) . '.gif';
        $publicPath = dirname(__DIR__). '/Public/Img/';

        file_exists($publicPath) || mkdir($publicPath);

        copy($originalFile, $publicPath . $fileName);

        $query = sprintf(
            "INSERT INTO image (filename, content) VALUES ('%s', '%s')",
            mysql_real_escape_string($fileName),
            mysql_real_escape_string(file_get_contents($originalFile))
        );
        if (!$db->real_query($query))
        {
            die("Failed at $fileName: " . $db->error);
        }
        echo '.';
    }
    $prencentage = ($iterator/$multiplier) * 100;
    echo ' (', $prencentage,' %)', NL;
};

echo NL, 'Copied ', $originals * $multiplier, ' images to DB and Public/Img -folder', NL;