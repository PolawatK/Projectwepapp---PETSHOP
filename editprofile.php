<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change profile</title>
    <link rel="stylesheet" href="style/editprofiles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
session_start();
require_once('conn.php'); 

if (!isset($_SESSION['cus_email'])) {
    header("Location: login.php");
    exit();
}

$cus_id = $_SESSION['cus_id'];  
$fname  = $_SESSION['cus_fname'];
$lname  = $_SESSION['cus_lname'];
$email  = $_SESSION['cus_email'];

if (isset($_POST["sub-btn"])) {
    $result_old = mysqli_query($conn, "SELECT cus_picture FROM customer WHERE cus_id = '$cus_id'");
    $old_data = mysqli_fetch_assoc($result_old);
    $old_picture = $old_data['cus_picture'];

    if (!empty($_FILES["uploadfile"]["name"])) {
        $cus_picture = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
    } else {
        $cus_picture = $old_picture;
        $tempname = null;
    }
    $sql = "
        UPDATE customer 
        SET cus_fname    = '{$_POST['cus_fname']}',
            cus_lname    = '{$_POST['cus_lname']}',
            cus_address  = '{$_POST['cus_address']}',
            cus_phone    = '{$_POST['cus_phone']}',
            cus_username = '{$_POST['cus_username']}',
            cus_picture  = '$cus_picture'
        WHERE cus_id = '$cus_id'
    ";
    $folder = "img/profile_pic/" . basename($cus_picture);
    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($tempname, $folder);

        $_SESSION['cus_fname'] = $_POST['cus_fname'];
        $_SESSION['cus_lname'] = $_POST['cus_lname'];
        $_SESSION['cus_username'] = $_POST['cus_username'];
        $_SESSION['cus_address'] = $_POST['cus_address'];
        $_SESSION['cus_phone'] = $_POST['cus_phone'];
        $_SESSION['cus_picture'] = $cus_picture;
    echo "<script>alert('อัพเดตข้อมูลสำเร็จ!');</script>";
    echo "<script>window.location.href='editprofile.php';</script>";
    }
}

    $result = mysqli_query($conn, "SELECT cus_picture FROM customer WHERE cus_id = '$cus_id'");
    $imageRow = mysqli_fetch_assoc($result);
    $cus_picture = $imageRow['cus_picture'] ?? 'default.png';

?>

<?php
    if (!isset($_SESSION['cus_id'])) {
        header("Location: login.php");
        exit();
    }
    $sql = "SELECT * FROM customer WHERE cus_id = '$cus_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
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
                    <li class="bell"><a href="orderhistory.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li>
                    <li class="bell"><a href=""><i class="fa-solid fa-bell"></i></a></li>
                    <li class="cart"><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li class="#"><a href="editprofile.php">สวัสดีคุณ <?php echo ($fname); ?> </a></li>
                    <li class="pic-box">
                        <a href="editprofile.php">
                            <img src="img/profile_pic/<?php echo $cus_picture; ?>" alt="Profile Image">
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
    <div class ="containers">
            <form action="editprofile.php" method="POST" enctype="multipart/form-data">
                <div class="left-side">
                    <h1>รูปภาพโปรไฟล์</h1>
                    <div class ="profile-box">
                        <img src="img/profile_pic/<?php echo $cus_picture; ?>" alt="Profile Image" class="dp">
                    </div>
                    <div class="input_box">
                        <input type="file" name="uploadfile" id="upload-btn" class="custom-file-input" value="<?=$row['cus_picture'];?>">
                    </div>
                </div>
                <div class="right-side">
                    <div class="input_box">
                        <p>ชื่อ</p>
                        <input type="text" placeholder="ชื่อจริง" name="cus_fname" value="<?=$row['cus_fname'];?>">
                        <p>นามสกุล</p>
                        <input type="text" placeholder="นามสกุล" name="cus_lname" value="<?=$row['cus_lname'];?>">
                    </div>
                    <div class="input_box">
                        <p>อีเมล</p>
                        <input type="email" placeholder="อีเมล" name="cus_email" value="<?=$row['cus_email'];?>">
                    </div>
                    <div class="input_box">
                        <p>ชื่อผู้ใช้</p>
                        <input type="text" placeholder="ชื่อผู้ใช้" name="cus_username" value="<?=$row['cus_username'];?>">
                    </div>
                    <div class="input_box">
                        <p>ที่อยู่</p>
                        <input type="text" placeholder="ที่อยู่" name="cus_address" value="<?=$row['cus_address'];?>">
                    </div>
                    <div class="input_box">
                        <p>เบอร์โทรศัพท์</p>
                        <input type="text" placeholder="เบอร์โทรศัพท์" name="cus_phone" value="<?=$row['cus_phone'];?>">
                    </div>
                    <div class="input_box">
                        <input type="submit" value="บันทึก" class="sub-btn" name="sub-btn">
                    </div>
                </div>
            </form>
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
</body>
</html>
