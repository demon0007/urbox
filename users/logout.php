<?php
$cookie='user';
setcookie($cookie, $_COOKIE['user'], time() - (60*5), "/");
header('Location: ../index.html?logout=success');
 ?>
