<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <ul>
            <a href="admin-login.php">
                <li>
                    <i class="fa-solid fa-house"></i>
                    หน้าเเรก
                </li>
            </a>
            <a href="admin-customer.php">
                <li class="active">
                    <i class="fa-solid fa-users-gear"></i>
                    จัดการลูกค้า
                </li>
            </a>
            <a href="admin-product.php">
                <li>
                    <i class="fa-solid fa-box-open"></i>
                    จัดการสินค้า
                </li>
            </a>
        </ul>
    </nav>
    <div class="container-data">
        <h1>จัดการลูกค้า</h1>
        <hr>
        <div class="table-data">
            <table>
                <thead>
                    <tr>
                        <th>รหัสลูกค้า</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ชื่อบัญชีผู้ใช้</th>
                        <th>เบอร์โทร</th>
                        <th>อีเมล</th>
                        <th>ที่อยู่</th>
                        <th>ธุรกรรม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php // show data by fetch from database
                            require('conn.php');
                            $sql = "SELECT * FROM customer";
                            $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row['cus_id']."</td>";
                                        echo "<td>".htmlspecialchars($row['cus_fname'].' '.$row['cus_lname'])."</td>";
                                        echo "<td>".htmlspecialchars($row['cus_username'])."</td>";
                                        echo "<td>".htmlspecialchars($row['cus_phone'])."</td>";
                                        echo "<td>".htmlspecialchars($row['cus_email'])."</td>";
                                        echo "<td>".htmlspecialchars($row['cus_address'])."</td>";
                                        echo '<td class="t-button">
                                                <a href="adminedit-cus.php?cus_id='.$row['cus_id'].'"><button type="button">แก้ไข</button></a>
                                                <form method="post" action="delete-customer.php" onsubmit="return confirm(\'ต้องการลบผู้ใช้ '.addslashes($row['cus_fname'].' '.$row['cus_lname']).' หรือไม่?\');">
                                                    <input type="hidden" name="cus_id" value="'.$row['cus_id'].'">
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