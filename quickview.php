<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/quickview.css">
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
                    <li class="regis-btn"><a href="#">เข้าสู่ระบบ</a></li>
                </ul>
            </div>
        </div>
    </header>
    <nav class="main-nav" id="mainNav">
            <ul>
                <li><a href="index.php" >หน้าแรก</a></li>
                <li><a href="petfood.php" class="<?= $category_id == '1' || $category_id == '2' ? 'active' : '' ?>">อาหารสัตว์เลี้ยง</a>
                    <ul class="nav-dropdown">
                        <li><a href="#" class="<?= $category_id == '1' ? 'active' : '' ?>">อาหารน้องหมา</a></li>
                        <li><a href="#" class="<?= $category_id == '2' ? 'active' : '' ?>">อาหารน้องเเมว</a></li>
                    </ul>
                </li>
                <li><a href="" class="<?= $category_id == '7' ? 'active' : '' ?>">ของเล่นสัตว์เลี้ยง</a></li>
                <li><a href="" class="<?= $category_id == '6' ? 'active' : '' ?>">ผลิตภัณฑ์ดูแลสุขภาพ</a></li>
            </ul>
        </nav>
    <div class="BGOut">
            <div class="BGProduct">
                <div class="data_left">
                    <div>
                        <img src="<?=$row['image_url'];?>" >
                    </div>
                </div>
                <div class="data_right">
                    <h1><?=$row['product_name'];?></h1>
                    <h2>ยี่ห้อ : <?=$row['brand'];?></h2>
                    <h2>คำอธิบาย : <?=$row['description'];?></h2>
                    <h2>ราคา : ฿<?=$row['price'];?></h2>
                    <h2>จำนวนที่มี : <?=$row['stock_qty'];?></h2>
                    <a href="Login.php"><button>ซื้อสินค้า</button></a>  <!--เดี๋ยวมาแก้-->
                </div>
            </div>
        </div>
    <script src="js/scripts.js"></script>
</body>
</html>