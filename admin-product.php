<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสินค้า</title>
    <link rel="stylesheet" href="style/adminedits.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
session_start();
    require("conn.php");
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
<div class="container-bd">
    <nav>
        <div class="imgbox">
            <img src="img/Logo-coin.png" alt="">
        </div>
        <ul>
            <a href="admin-login.php">
                <li>
                    <i class="fa-solid fa-house"></i>
                    หน้าเเรก
                </li>
            </a>
            <a href="admin-customer.php">
                <li >
                    <i class="fa-solid fa-users-gear"></i>
                    จัดการลูกค้า
                </li>
            </a>
            <a href="admin-product.php">
                <li class="active">
                    <i class="fa-solid fa-box-open"></i>
                    จัดการสินค้า
                </li>
            </a>
        </ul>
    </nav>
    <div class="container-data">
        <div class="title-box">
            <h1>จัดการสินค้า</h1>
            <a href="admininsert-product.php"><button>เพิ่มสินค้า<i class="fa-solid fa-plus"></i></button></a>
        </div>
        <hr>
        <div class="table-data">
            <table>
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>รหัสชนิดสินค้า</th>
                        <th>เเบรนด์</th>
                        <th>ราคา</th>
                        <th>จำนวนคงเหลือ</th>
                        <th>หน่วย</th>
                        <th>คำอธิบาย</th>
                        <th>รูปภาพ</th>
                        <th>ธุรกรรม</th>
                    </tr>
                </thead>
                <tbody><img src="" alt="">
                    <?php // show data by fetch from database
                            require('conn.php');
                            $sql = "SELECT * FROM product";
                            $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row['product_id']."</td>";
                                        echo "<td>".$row['product_name']."</td>";
                                        echo "<td>".$row['category_id']."</td>";
                                        echo "<td>".$row['brand']."</td>";
                                        echo "<td>".$row['price']."</td>";
                                        echo "<td>".$row['stock_qty']."</td>";
                                        echo "<td>".$row['unit']."</td>";
                                        echo "<td>".$row['description']."</td>";
                                        echo "<td>";
                                        echo '<img src="img/Productimg/' . $row['image_url'] . '" >';
                                        echo "</td>";
                                        echo '<td class="t-button">
                                                <a href="adminedit-product.php?product_id='.$row['product_id'].'"><button type="button">แก้ไข</button></a>
                                                <form method="post" action="delete-product.php" onsubmit="return confirm(\'ต้องการลบสินค้า '.addslashes($row['product_name']).' หรือไม่?\');">
                                                    <input type="hidden" name="product_id" value="'.$row['product_id'].'">
                                                    <button type="submit" name="delete-btn">ลบ</button>
                                                </form>
                                            </td>';
                                        echo "</tr>";
                                    }
                                }else {
                                    echo "0 results";
                                }
                            $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    
</body>
</html>