<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/indext.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
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
                    <li class="regis-btn"><a href="login.php">เข้าสู่ระบบ</a></li>
                </ul>
            </div>
        </div>
    </header>
    <nav class="main-nav" id="mainNav">
            <ul>
                <li><a href="index.php">หน้าแรก</a></li>
                <li><a href="petfood.php">อาหารสัตว์เลี้ยง</a>
                    <ul class="nav-dropdown">
                        <li><a href="#">อาหารน้องหมา</a></li>
                        <li><a href="#">อาหารน้องเเมว</a></li>
                    </ul>
                </li>
                <li><a href="">ของเล่นสัตว์เลี้ยง</a></li>
                <li><a href="">ผลิตภัณฑ์ดูแลสุขภาพ</a></li>
            </ul>
        </nav>
    <div class="container-pt">
        <div class="pt-title">
            <h3>Good day Shop</h3>
            <h1>PET SHOP <br> & CARE</h1>
            <button><a href="">เลือกซื้อสินค้า</a><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
    <h1 class="title-bd">สินค้าขายดี</h1>
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
                            echo '<img src="' . $row["image_url"] . '" alt="">';
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
    <h1 class="title-bd">อาหารสัตว์เลี้ยง</h1>
    <div class="Petfood">
            <?php 
               require("conn.php");
               $sql = "SELECT * FROM product WHERE category_id = 1";
               $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<a href="#">';
                            echo '<div class="item-box">';
                            echo '<div class="it-img-box">';
                            echo '<img src="' . $row["image_url"] . '" alt="">';
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
    


    <script src="js/scripts.js"></script>
</body>
</html>