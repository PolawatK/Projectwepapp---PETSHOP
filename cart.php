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
    require_once("conn.php");
    session_start();

    if (!isset($_SESSION['cus_email'])) {
    header("Location: login.php");
    exit();
}
    $cus_id = $_SESSION["cus_id"];
    $fname = $_SESSION['cus_fname'];
    $lname = $_SESSION['cus_lname'];
    $email = $_SESSION['cus_email'];
    $picture = $_SESSION['cus_picture'];
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
<h1 class="title-bd">รายการสินค้าของคุณ</h1>
<div class="container-bd">
    <?php
$cus_id = $_SESSION["cus_id"];
$sql = "
    SELECT 
        p.product_id,
        p.product_name,
        p.price,
        p.image_url,
        ci.quantity,
        ci.cart_id,
        ci.unit_price_snapshot,
        (ci.quantity * ci.unit_price_snapshot) AS subtotal
    FROM cart c
    INNER JOIN cart_item ci ON c.cart_id = ci.cart_id
    INNER JOIN product p ON ci.product_id = p.product_id
    WHERE c.cus_id = '$cus_id'
";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th colspan='2'>สินค้า</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>ราคารวม</th>
          </tr>";

    $total = 0;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='img/Productimg/" . $row['image_url'] . "' width='80'></td>";
        echo "<td>" . $row['product_name'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['price']. "</td>";
        echo "<td>" . $row['subtotal']."</td>";
         echo '<td>
                <form method="post" action="delete-cart.php";
                onsubmit="return confirm(\'ต้องการลบสินค้า '.addslashes($row['product_name']).' หรือไม่?\');">
                            <input type="hidden" name="product_id" value="'.$row['product_id'].'">
                            <input type="hidden" name="cart_id" value='.$row['cart_id'].'>
                <button type="submit" name="delete-btn">ลบ</button>
                </form>
                </td>';
        echo "</tr>";
        $total += $row['subtotal'];
    }

    echo "<tr><td colspan='4' class ='total'>รวมทั้งหมด</td><td class='num-total'>" . number_format($total, 2) . " บาท</td></tr>";
    echo "</table>";
} else {
    echo "ไม่มีสินค้าในตะกร้า";
}
?>


</div>
<div class="checkout">
    <form method="post" action="checkout.php" onsubmit="return confirm('ยืนยันการสั่งซื้อสินค้าทั้งหมดหรือไม่?');">
        <input type="hidden" name="cart_id" value="<?= $row['cart_id'] ?>">
        <button type="submit" name="checkout-btn" class="buy-btn">สั่งซื้อสินค้า</button>
    </form>

</div>

</body>
</html>