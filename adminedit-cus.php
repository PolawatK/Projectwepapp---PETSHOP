<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="style/editcus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        if(!isset($_GET['cus_id'])){
            header("refresh: 0; url=admin-customer.php");
        }
        require 'conn.php';
        $sql = "SELECT * FROM customer WHERE cus_id='$_GET[cus_id]'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
    <?php
        
    if (isset($_POST["sub-btn"])) {
    $sql_update="UPDATE customer SET cus_fname='$_POST[cus_fname]',cus_lname='$_POST[cus_lname]' ,cus_username='$_POST[cus_username]',cus_address='$_POST[cus_address]',cus_phone='$_POST[cus_phone]' ,cus_email='$_POST[cus_email]' WHERE cus_id='$_POST[cus_id]' ";
    $result= $conn->query($sql_update);
        if(!$result) {
            die("Error God Damn it : ". $conn->error);
        } echo "<script>
            alert('อัพเดตข้อมูลสำเร็จ!');
            window.location.href = 'admin-customer.php';
            </script>";
             exit;
    }
        ?>

<div class="container-bd">
        <div class="regis-box">
            <form action="adminedit-cus.php" method="post">
                <h1>เเก้ไขข้อมูลผู้ใช้</h1>
                    <div class="input-box-name">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="cus_id" id="cus_id" value="<?=$row['cus_id'];?>" hidden>
                        <input type="text" name="cus_fname" class="fname" required placeholder="ชื่อจริง" value="<?=$row['cus_fname'];?>">
                        <input type="text" name="cus_lname" class="lname" required placeholder="นามสกุล" value="<?=$row['cus_lname'];?>">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="cus_email" required placeholder="อีเมล" value="<?=$row['cus_email'];?>">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-file-signature"></i>  
                        <input type="text" name="cus_username" id="cus_username" required placeholder="ชื่อบัญชีผู้ใช้" value="<?=$row['cus_username'];?>">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" name="cus_address" id="cus_address" required placeholder="ที่อยู่" value="<?=$row['cus_address'];?>">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-phone-volume"></i>
                        <input type="text" name="cus_phone" id="cus_phone" required placeholder="เบอร์โทร" value="<?=$row['cus_phone'];?>">
                    </div>
                    <button type="submit" class="sub-btn" name="sub-btn" id="sub-btn" >เเก้ไขข้อมูลผู้ใช้</button>
            </form>
     </div>
        
    </div>

</body>
</html>