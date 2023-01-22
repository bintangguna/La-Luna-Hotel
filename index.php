<?php
include_once "db.php";
session_start();
$db = new database();
if (isset($_SESSION['emp_id'])) {
    $emp_id = $_SESSION['emp_id'];
    $userQuery = "SELECT * FROM staff JOIN staff_type ON staff.staff_type_id = staff_type.staff_type_id WHERE  emp_id =  '$emp_id'";
    $result = mysqli_query($db->connection, $userQuery);
    $user = mysqli_fetch_assoc($result);
} else {
    header('Location:villa-master/index.php');
}
include_once "header.php";
include_once "sidebar.php";


if (isset($_GET['room_mang'])) {
    include_once "room_mang.php";
} 
elseif (isset($_GET['dashboard'])) {
    include_once "dashboard.php";
} 
elseif (isset($_GET['reservation'])) {
    include_once "reservation.php";
} 
elseif (isset($_GET['staff_mang'])) {
    include_once "staff_mang.php";
} 
elseif (isset($_GET['add_emp'])) {
    include_once "add_emp.php";
} 
elseif (isset($_GET['emp_history'])) {
    include_once "emp_history.php";
} 
else {
    include_once "room_mang.php";
}

include_once "footer.php";