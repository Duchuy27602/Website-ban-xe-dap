<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunctions.php");

if (isset($_GET['code'])) {
    if (activateCode($_GET['code'])) {
        redirect("../login.php", "Xác nhận tài khoản thành công");
    } else {
        redirect("../login.php", "Xác nhận tài khoản thất bại");
    }
}