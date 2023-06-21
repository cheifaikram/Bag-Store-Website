<?php

include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:reg-log.html#log');

?>