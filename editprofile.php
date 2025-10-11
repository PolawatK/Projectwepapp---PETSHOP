<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change profile</title>
    <link rel="stylesheet" href="style/editprofile.css">
</head>

<?php
$db = mysqli_connect('localhost','root','','petshop');
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["upload"])){
    $cus_picture = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "img/profile_pic/".basename($cus_picture);

   
    $sql = "INSERT INTO customer (cus_picture) VALUES ('$cus_picture')";
    mysqli_query($db,$sql);

    if(move_uploaded_file($tempname,$folder)){
      
        $del = mysqli_query($db,"
            DELETE FROM customer
            WHERE cus_id<(SELECT MAX(cus_id) FROM customer)
        ");
    } else {
        echo "Failed to upload image";
    }
}

$result = mysqli_query($db,"SELECT cus_picture FROM customer WHERE cus_picture != '' ORDER BY cus_id DESC LIMIT 1");
$imagedp = mysqli_fetch_array($result);


?>

<body>
    <div class ="box">
        <div class = "containers profile-box">
            <div id ="profile">
                <h3>Update Profile</h3>
                <img src="<?php echo 'img/profile_pic/' . $imagedp['cus_picture']; ?>" alt="Profile Image" class="dp">
                <h6>Profile image</h6>
            </div>
            <form action="editprofile.php" method="POST" enctype="multipart/form-data">
                <div class="input_box">
                    <input type="file" name="uploadfile" id="upload-btn" class="custom-file-input">
                </div>
                <div class="input_box">
                    <input type="submit" name="upload" class="file-upload" value="Upload Image">
                </div>
            </form>
        </div>

        <div class="containers info">
            <form action="editprofile.php" method="POST">
                <div class="input_box">
                    <span>ชื่อจริง</span>
                    <input type="text" placeholder="ชื่อจริง">
                </div>
                <div class="input_box">
                    <span>นามสกุล</span>
                    <input type="text" placeholder="นามสกุล">
                </div>
                <div class="input_box">
                    <span>อีเมล</span>
                    <input type="email" placeholder="อีเมล">
                </div>
                <div class="input_box">
                    <span>ชื่อผู้ใช้</span>
                    <input type="text" placeholder="ชื่อผู้ใช้">
                </div>
                <div class="input_box">
                    <span>ที่อยู่</span>
                    <input type="text" placeholder="ที่อยู่">
                </div>
                <div class="input_box">
                    <span>เบอร์โทรศัพท์</span>
                    <input type="text" placeholder="เบอร์โทรศัพท์">
                <div class="input_box">
                    <input type="submit" value="บันทึก" class="save-btn">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
