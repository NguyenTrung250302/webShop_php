<?php
// Bắt đầu session nếu chưa bắt đầu
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Hủy bỏ biến session 'user' nếu tồn tại
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

// Hủy bỏ toàn bộ session
session_destroy();

// Chuyển hướng về trang index_home.php
header('Location: index_home.php');
exit(); // Đảm bảo rằng mã dừng lại sau khi chuyển hướng