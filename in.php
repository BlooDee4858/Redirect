<?php
require_once 'User.php';

$u = new User();
$url = $u->GetUrl($u->GetUserBrowser()['browser'], $u->GetUserBrowser()['version'], $u->GetUserCountry(), $u->CheckUnique());

header("Location: " . $url);