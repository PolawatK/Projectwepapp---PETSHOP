<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักเเอดมิน</title>
    <link rel="stylesheet" href="style/admins.css">
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

    $db = mysqli_connect('localhost','root','','petshop');

    $result_customer = mysqli_query($db, "SELECT COUNT(*) AS total_customer FROM customer");
    $row_customer = mysqli_fetch_assoc($result_customer);
    $total_customer = $row_customer['total_customer'];

    
    $result_product = mysqli_query($db, "SELECT COUNT(*) AS total_product FROM product");
    $row_product = mysqli_fetch_assoc($result_product);
    $total_product = $row_product['total_product'];

    
    $result_sales = mysqli_query($db, "SELECT COUNT(*) AS total_sales FROM orders");
    $row_sales = mysqli_fetch_assoc($result_sales);
    $total_sales = $row_sales['total_sales'];
?>
<body>
    <div class="container-bd">
    <nav>
        <div class="imgbox">
            <img src="img/Logo-coin.png" alt="">
        </div>
        <ul>
            <a href="admin-login.php">
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
            <a href="admin-product.php">
                <li>
                    <i class="fa-solid fa-box-open"></i>
                    จัดการสินค้า
                </li>
            </a>
        </ul>
    </nav>
    </div>

    <div class="dashboard-bd">
    <div class="body-content">
    <h1>Dashboard</h1>
    <div class="container-eiei">
        <div class="static-box">
            <div class="static customer">
                <div class="icon">
                    <i class="fa-solid fa-users-gear"></i>
            </div>
            <div class="data">
                    <h3><?php echo $total_customer; ?></h3>
                    <span>จำนวนลูกค้า</span>
                </div>
            </div>

            <div class="static product">
                <div class="icon">
                    <i class="fa-solid fa-box-open"></i>
                </div>
            <div class="data">
                    <h3><?php echo $total_product; ?></h3>
                    <span>จำนวนสินค้า</span>
                </div>
            </div>

            <div class="static totalsale">
                <div class="icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="data">
                    <h3><?php echo $total_sales; ?></h3>
                    <span>ยอดขายทั้งหมด</span>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container-data">
        <h1>รายละเอียดการสั่งซื้อ</h1>
        <hr>
        <div class="table-data">
            <table>
                <thead>
                    <tr>
                        <th>รหัสรายละเอียดออเดอร์</th> <!-- id_detail -->
                        <th>ชื่อสินค้า</th> <!-- product_name -->
                        <th>ราคา</th> <!-- price -->
                        <th>ชื่อผู้ซื้อ</th> <!-- cus_username -->
                        <th>อีเมล</th> <!-- cus_email -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            require('conn.php');
                            $sql = "SELECT OD.order_detail_id, O.order_id, P.product_name, P.price, C.cus_fname, C.cus_lname, C.cus_email  FROM order_detail as OD
                            join orders as O on OD.order_id = O.order_id
                            join product as P on OD.product_id = P.product_id
                            join customer as C on O.cus_id = C.cus_id"; 
                            $result = mysqli_query($conn, $sql);


                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row['order_detail_id']."</td>";
                                        echo "<td>".htmlspecialchars($row['product_name'])."</td>";
                                        echo "<td>".htmlspecialchars($row['price'])."</td>";
                                        echo "<td>".htmlspecialchars($row['cus_fname'].' '.$row['cus_lname'])."</td>";
                                        echo "<td>".htmlspecialchars($row['cus_email'])."</td>";
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