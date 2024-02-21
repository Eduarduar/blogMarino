<?php

$pass = md5("12345678");
$passHash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
echo $passHash;

?>