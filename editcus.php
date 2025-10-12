<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="">
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

     <div class="content">
    <a href='admin-customer.php'><i class="fa-solid fa-arrow-left"></i></a>
    <h2>เเก้ไขข้อมูล</h2>
    <form method="post" action="editcus.php">
        <div class="input-box">
            <label>ชื่อ</label>
            <input type="text" name="cus_id" id="cus_id" value="<?=$row['cus_id'];?>" hidden>
            <input type="text" name="cus_fname" id="cus_fname" value="<?=$row['cus_fname'];?>" required/>
        </div>
        <div class="input-box">
            <label>นามสกุล</label>
            <input type="text" name="cus_lname" id="cus_lname" value="<?=$row['cus_lname'];?>" required/>
        </div>
        <div class="input-box">
            <label>ชื่อบัญชี</label>
            <input type="text" name="cus_username" id="cus_username" value="<?=$row['cus_username'];?>"/>
        </div>
        <div class="input-box">
            <label>ที่อยู่</label>
            <input type="text" name="cus_address" id="cus_address" value="<?=$row['cus_address'];?>" />
        </div>
        <div class="input-box">
            <label>เบอร์โทร</label>
            <input type="text" name="cus_phone" id="cus_phone" value="<?=$row['cus_phone'];?>" />
        </div>

        <div class="input-box">
            <label>อีเมล</label>
            <input type="text" name="cus_email" id="cus_email" value="<?=$row['cus_email'];?>" required/>
        </div>
        <input class="sub-btn" type="submit" value="บันทึก" name="sub-btn">
    </form>
    </div>

</body>
</html>