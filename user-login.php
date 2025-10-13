<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
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
                <li><a href="user-login.php" class="active">หน้าแรก</a></li>
                <li><a href="#petfood">อาหารสัตว์เลี้ยง</a>
                    <ul class="nav-dropdown">
                        <li><a href="#dogfood" >อาหารน้องหมา</a></li>
                        <li><a href="#catfood" >อาหารน้องเเมว</a></li>
                    </ul>
                </li>
                <li><a href="#lead">ปลอกคอเเละสายจูง</a></li>
                <li><a href="#petbackpack">กระเป๋าสัตว์เลี้ยง</a></li>
                <li><a href="#pettoy">ของเล่นสัตว์เลี้ยง</a></li>
                <li><a href="#petcare">ผลิตภัณฑ์ดูแลสุขภาพ</a></li>
            </ul>
        </nav>
    <div class="container-pt">
        <div class="pt-title">
            <h3>Good day Shop</h3>
            <h1>PET SHOP <br> & CARE</h1>
            <a href="#bestseller"><button>เลือกซื้อสินค้า<i class="fa-solid fa-arrow-right"></i></button></a>
        </div>
    </div>
    <section id="bestseller">
    <h1 class="title-bd">สินค้าขายดี</h1>
    <hr>
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
    </section>
    <div class="infinite-container">
        <h1>แบรนด์ที่มีของในสต็อก</h1>
        <div class ="infinite">
            <div class = "infi-logo">
                <img src="img/logo/1.png" alt="">
                <img src="img/logo/2.png" alt="">
                <img src="img/logo/3.png" alt="">
                <img src="img/logo/4.png" alt="">
                <img src="img/logo/5.png" alt="">
                <img src="img/logo/6.png" alt="">
            </div>

            <div class = "infi-logo">
                <img src="img/logo/1.png" alt="">
                <img src="img/logo/2.png" alt="">
                <img src="img/logo/3.png" alt="">
                <img src="img/logo/4.png" alt="">
                <img src="img/logo/5.png" alt="">
                <img src="img/logo/6.png" alt="">
            </div>

            <div class = "infi-logo">
                <img src="img/logo/1.png" alt="">
                <img src="img/logo/2.png" alt="">
                <img src="img/logo/3.png" alt="">
                <img src="img/logo/4.png" alt="">
                <img src="img/logo/5.png" alt="">
                <img src="img/logo/6.png" alt="">
            </div>
        </div>
    </div>
    <h1 class="title-bd" id="petfood">อาหารสัตว์เลี้ยง</h1>
    <hr>
    <p class="title-bd-descript" id="dogfood">🐶อาหารหมา</p>
    <div class="container-bd-pro">
            <?php 
               require("conn.php");
               $sql = "SELECT * FROM product WHERE category_id = 1";
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
    <p class="title-bd-descript"id="catfood">🐱อาหารเเมว</p>
    <div class="container-bd-pro" >
            <?php 
               require("conn.php");
               $sql = "SELECT * FROM product WHERE category_id = 2";
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
    <h1 class="title-bd" id="lead">ปลอกคอเเละสายจูง</h1>
    <hr>
    <div class="container-bd-pro">
            <?php 
               require("conn.php");
               $sql = "SELECT * FROM product WHERE category_id = 4";
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
    <h1 class="title-bd" id="petbackpack">กระเป๋าสัตว์เลี้ยง</h1>
    <hr>
    <div class="container-bd-pro">
            <?php 
               require("conn.php");
               $sql = "SELECT * FROM product WHERE category_id = 5";
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
    <h1 class="title-bd" id="pettoy">ของเล่นสัตว์เลี้ยง</h1>
    <hr>
    <div class="container-bd-pro">
            <?php 
               require("conn.php");
               $sql = "SELECT * FROM product WHERE category_id = 6";
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
    <h1 class="title-bd" id="petcare">ผลิตภัณฑ์ดูแลสุขภาพ</h1>
    <hr>
    <div class="container-bd-pro">
            <?php 
               require("conn.php");
               $sql = "SELECT * FROM product WHERE category_id = 3";
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
    <footer>
    <div class="big-footer">
        <div class="container-footer">
            <div class="title">
                    <h3>Contact Us</h3>
            </div>
            <div class="footer-content">
                    <p>Email:GoodDayShop@gmail.com</p>
            </div>
        </div>
        <div class="footer-content-eiei">
                    <h3>Follow Us</h3>
                    <ul class="social-icons">
                        <li><a href=""><i class="fa-brands fa-facebook"></i></i></a></li>
                        <li><a href=""><i class ="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-instagram"></i></i></a></li>
                    </ul>  
        </div>
    </div>
        <div class = bottom-bar>
                <p>Copyright &copy; 2024 Good Day Shop All rights reserved</p>
        </div>
    </footer>


    <script src="js/index-script.js"></script>
</body>
</html>