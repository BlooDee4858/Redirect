<?php
require_once 'User.php';

$u = new User();

echo $u->GetUserBrowser()['version'];

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<form action="User/in.php" target="_blank">
<button>Пользователь</button>
</form>
<form action="admin/admin.php" target="_blank">
<button>Админ</button>
</form>
</body>
</html>