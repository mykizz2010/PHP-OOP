<?php
require_once 'main/init.php';

$user = new User();
$user->logout();
Redirect::to('index.php');