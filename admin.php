<?php

$connect = new PDO("mysql:host=localhost; dbname=redirect; charset=utf8", 'root', '');

$title = 'admin main page';

$sql = "SELECT * FROM rule";

$result = $connect->query($sql);
$result = $result->fetchAll(PDO::FETCH_ASSOC);

$content = '<table>';
foreach ($result as $res)
{
    $content =  '<tr><td></td></tr>';
}
$content = '</table>';

include 'layout.php';
?>