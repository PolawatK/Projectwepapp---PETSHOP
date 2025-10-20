<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ตะกร้าสินค้า</title>
</head>
<body>
<?php
session_start();
require_once("conn.php");

if (!isset($_SESSION['cus_id'])) {
    header("Location: login.php");
    exit();
}
$fname = $_SESSION['cus_fname'];
$lname = $_SESSION['cus_lname'];
$email = $_SESSION['cus_email'];
$picture = $_SESSION['cus_picture'];
$cus_id = $_SESSION["cus_id"];
$sql_orders = "SELECT * FROM orders WHERE cus_id = '$cus_id' ORDER BY order_date DESC";
$result = $conn->query($sql_orders);
?>

   <header>
<div class="head-container">
            <div class="logo">
                <img src="img/Shop2.png">
            </div>
            <div class="search-box">
                <input type="text">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="menubar">
                <ul>
                    <li class="bell"><a href="orderhistory.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li>
                    <li class="bell"><a href=""><i class="fa-solid fa-bell"></i></a></li>
                    <li class="cart"><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li class="#"><a href="editprofile.php">สวัสดีคุณ <?php echo ($fname); ?> </a></li>
                    <li class="pic-box">
                        <a href="editprofile.php">
                            <img src="img/profile_pic/<?php echo $picture; ?>" alt="Profile Image">
                        </a>
                    </li>
                    <li class="regis-btn"><a href="login.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </header>

<nav class="main-nav" id="mainNav">
            <ul>
                <li><a href="user-login.php">หน้าแรก</a></li>
                <li><a href="user-login.php">อาหารสัตว์เลี้ยง</a>
                    <ul class="nav-dropdown">
                        <li><a href="user-login.php" >อาหารน้องหมา</a></li>
                        <li><a href="user-login.php" >อาหารน้องเเมว</a></li>
                    </ul>
                </li>
                <li><a href="user-login.php">ปลอกคอเเละสายจูง</a></li>
                <li><a href="user-login.php">กระเป๋าสัตว์เลี้ยง</a></li>
                <li><a href="user-login.php">ของเล่นสัตว์เลี้ยง</a></li>
                <li><a href="user-login.php">ผลิตภัณฑ์ดูแลสุขภาพ</a></li>
            </ul>
        </nav>
<h1 class="title-bd">ประวัติการสั่งซื้อสินค้า</h1>
<div class="container-bd">
<?php

if ($result && $result->num_rows > 0) {
    echo"<table>";
        echo "<tr>
                <th>รหัสออเดอร์</th>
                <th>วันที่สั่งซื้อ</th>
                <th>ราคาที่สั่งซื้อ</th>
            </tr>";
        $total = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo    "<td>" . $row['order_id'] . "</td>";
            echo    "<td>" . $row['order_date'] . "</td>";
            echo    "<td>" . $row['total_price']. " บาท</td>";
            echo "</tr>";
    }
    echo"</table>";
}else{
    echo "ไม่มีประวัติการซื้อสินค้า";
}
?>


</div>

</body>
</html>