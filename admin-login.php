<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
session_start();

    if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}
    $admin_username = $_SESSION['admin_username']; 
    $admin_password = $_SESSION['admin_password'];
    $admin_fname = $_SESSION['admin_fname'];
    $admin_lname = $_SESSION['admin_lname'];
    $admin_email = $_SESSION['admin_email']; 
    $admin_phone = $_SESSION['admin_phone'];
    $admin_picture = $_SESSION['admin_picture'];
?>
<body>
    <nav>
        <ul>
            <a href="">
                <li class="active">
                    <i class="fa-solid fa-house"></i>
                    หน้าเเรก
                </li>
            </a>
            <a href="admin-customer.php">
                <li>
                    <i class="fa-solid fa-users-gear"></i>
                    จัดการลูกค้า
                </li>
            </a>
            <a href="">
                <li>
                    <i class="fa-solid fa-box-open"></i>
                    จัดการสินค้า
                </li>
            </a>
        </ul>
    </nav>

    
</body>
</html>