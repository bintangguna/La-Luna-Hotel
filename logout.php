<?php
session_start();
unset($_SESSION['emp_id']);
unset($_SESSION['username']);
session_abort();
session_destroy();
header('Location:villa-master/index.php');