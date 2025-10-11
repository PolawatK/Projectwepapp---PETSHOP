<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change profile</title>
    <link rel="stylesheet" href="style/editprofile.css">
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
}
    echo "<script>alert('อัพเดตข้อมูลสำเร็จ!');</script>";
}

$result = mysqli_query($conn, "SELECT cus_picture FROM customer WHERE cus_id = '$cus_id'");
$imagedp = mysqli_fetch_array($result);
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
                    <li class="bell"><a href="editprofile.php">สวัสดีคุณ <?php echo ($fname); ?> </a></li>
                    <li class="cart"><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li class="regis-btn"><a href="login.php">ออกจากระบบ</a></li>
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

<body>
    <div class ="containers">
            <div class="containers-info">
            <form action="editprofile.php" method="POST" enctype="multipart/form-data">
                <div class ="profile-box">
                    <img src="<?php echo 'img/profile_pic/' . $imagedp['cus_picture']; ?>" alt="Profile Image" class="dp">
                </div>
                <div class="input_box">
                    <input type="file" name="uploadfile" id="upload-btn" class="custom-file-input" value="<?=$row['cus_picture'];?>">
                </div>
                <div class="input_box_t">
                    <input type="text" placeholder="ชื่อจริง" name="cus_fname" value="<?=$row['cus_fname'];?>">
                    <input type="text" placeholder="นามสกุล" name="cus_lname" value="<?=$row['cus_lname'];?>">
                </div>
                <div class="input_box">
                    <span>อีเมล</span>
                    <input type="email" placeholder="อีเมล" name="cus_email" value="<?=$row['cus_email'];?>">
                </div>
                <div class="input_box">
                    <span>ชื่อผู้ใช้</span>
                    <input type="text" placeholder="ชื่อผู้ใช้" name="cus_username" value="<?=$row['cus_username'];?>">
                </div>
                <div class="input_box">
                    <span>ที่อยู่</span>
                    <input type="text" placeholder="ที่อยู่" name="cus_address" value="<?=$row['cus_address'];?>">
                </div>
                <div class="input_box">
                    <span>เบอร์โทรศัพท์</span>
                    <input type="text" placeholder="เบอร์โทรศัพท์" name="cus_phone" value="<?=$row['cus_phone'];?>">
                <div class="input_box">
                    <input type="submit" value="บันทึก" class="save-btn" name="sub-btn">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
