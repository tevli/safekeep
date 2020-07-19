<?php
require_once '../classes/Login.php';
Login::asUser();
echo $_SESSION['username'];
