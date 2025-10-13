<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/quickviews.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <?php
    if(!isset($_GET['product_id'])){
            header("refresh: 0; url=index.php");
        }
        require 'conn.php';
        $sql = "SELECT * FROM product WHERE product_id='$_GET[product_id]'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $category_id = $row['category_id']; 
    ?>
    <?php
session_start();

    if (!isset($_SESSION['cus_email'])) {
    header("Location: login.php");
    exit();
}
    $fname = $_SESSION['cus_fname'];
    $lname = $_SESSION['cus_lname'];
    $email = $_SESSION['cus_email'];
    $picture = $_SESSION['cus_picture'];
?>
<body>
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
                    <li class="bell"><a href=""><i class="fa-solid fa-bell"></i></a></li>
                    <li class="cart"><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
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
                <li><a href="#" class="<?= in_array($category_id, [1,2]) ? 'active' : '' ?>">อาหารสัตว์เลี้ยง</a>
                    <ul class="nav-dropdown">
                        <li><a href="user-login.php" class="<?= ($category_id == 1) ? 'active' : '' ?>">อาหารน้องหมา</a></li>
                        <li><a href="user-login.php" class="<?= ($category_id == 2) ? 'active' : '' ?>">อาหารน้องเเมว</a></li>
                    </ul>
                </li>
                <li><a href="user-login.php" class="<?= ($category_id == 4) ? 'active' : '' ?>">ปลอกคอเเละสายจูง</a></li>
                <li><a href="user-login.php" class="<?= ($category_id == 5) ? 'active' : '' ?>">กระเป๋าสัตว์เลี้ยง</a></li>
                <li><a href="user-login.php" class="<?= ($category_id == 6) ? 'active' : '' ?>">ของเล่นสัตว์เลี้ยง</a></li>
                <li><a href="user-login.php" class="<?= ($category_id == 3) ? 'active' : '' ?>">ผลิตภัณฑ์ดูแลสุขภาพ</a></li>
            </ul>
        </nav>
    <div class="BGOut">
            <div class="BGProduct">
                <div class="data_left">
                    <div class="zoom">
                        <img src="img/Productimg/<?=$row['image_url'];?>" >
                    </div>
                </div>
                <div class="data_right">
                    <div class="Content_right">
                       <h1><?=$row['product_name'];?></h1>
                        <br>
                        <hr>
                        <br>
                        <h2>ยี่ห้อ : <?=$row['brand'];?></h2>
                        <h2>คำอธิบาย : <?=$row['description'];?></h2>
                        <h2>ราคา : ฿<?=$row['price'];?></h2>
                        <h2>จำนวนที่มี : <?=$row['stock_qty'];?></h2> 
                    </div>
                    <div class="button_right">
                        <div class="BTbuy">
                            <a href="Login.php"><button>ซื้อสินค้า</button></a>
                        </div>
                        <div class="BTline">
                            <a href="Line.php"><i class="fa-brands fa-line"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="UnderBG">
   <h1 class="title-bd" id="bestseller">สินค้ารายการอื่น</h1>
    <hr class="hr-item">
    <div class="slider-hot-item">
    <button class="l-btn"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="r-btn"><i class="fa-solid fa-chevron-right"></i></button>
    <div class="container-bd">
        <?php 
                require("conn.php");
                $sql = "SELECT * FROM product";
               $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<a href='quickview.php?product_id=" . $row['product_id'] . "'>";
                            echo '<div class="item-box">';
                            echo '<div class="it-img-box">';
                            echo '<img src="img/Productimg/' . $row['image_url'] . '" >';
                            echo '</div>';
                            echo '  <div class="it-title">';
                            echo '      <h2>' . $row["product_name"] . '</h2>';
                            echo '      <h3><strong>ราคา : </strong>' . $row["price"] . '</h3>';
                            echo '  </div>';
                            echo '</div>';
                            echo '</a>';
                        }
                }else {
                        echo "ไม่มีสินค้า";
                    }
                    $conn->close();
                ?>
    </div>
    </div>
    </div>
    <script src="js/quick-scripts.js"></script>
</body>
</html>