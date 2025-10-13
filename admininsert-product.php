<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลสินค้า</title>
    <link rel="stylesheet" href="style/admininserts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
    
    if (isset($_POST["sub-btn"])) {
    require("conn.php");
    if (!empty($_FILES["uploadfile"]["name"])) {
        $image_url = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
    } else {
        $tempname = null;
    }
    $sql_insert="INSERT INTO product(product_id,product_name,category_id,brand,price,stock_qty,unit,description,image_url) VALUES ('$_POST[product_id]','$_POST[product_name]','$_POST[category_id]' ,'$_POST[brand]' ,'$_POST[price]' ,'$_POST[stock_qty]','$_POST[unit]','$_POST[description]','$image_url')";
    $result= $conn->query($sql_insert);
    $folder = "img/Productimg/" . basename($image_url);
    move_uploaded_file($tempname, $folder);
        if(!$result) {
            die("Error God Damn it : ". $conn->error);
        } echo 
            header("Location: admin-product.php");
             exit;
    }

    ?>
<div class="container-bd">
        <div class="regis-box">
            <form action="admininsert-product.php" enctype="multipart/form-data" method="post" onsubmit="return confirm('ต้องการเพิ่มข้อมูลสินค้า <?= addslashes($row['product_name'] ) ?> หรือไม่?')">
                <div class="image-box">
                    <h1>รูปภาพสินค้า</h1>
                    <div class ="product-box">
                        <img src="img/Productimg/test.png" alt="Product Image">
                    </div>
                    <div class="input_box">
                        <input type="file" class="custom-file-input" name="uploadfile" id="upload-btn" value="<?=$row['image_url'];?>">
                    </div>
                </div>
                <div class="data-box">
                    <h1>เพิ่มข้อมูลสินค้า</h1>
                    <div class="input-box-id">
                        <p>รหัสสินค้า</p>
                        <input type="text" name="product_id" id="product_id" required placeholder="รหัสสินค้า">
                    </div>
                    <div class="input-box-name">
                        <div class="left">
                        <p>ชื่อสินค้า</p>
                        <input type="text" name="product_name" class="product_name" required placeholder="ชื่อสินค้า" >
                        </div>
                        <div class="right">
                        <p>รหัสประเภทสินค้า</p>
                        <input type="text" name="category_id" class="category_id" required placeholder="รหัสประเภทสินค้า" >
                        </div>  
                    </div>
                    <div class="input-box">
                        <p>เเบรนด์สินค้า</p>
                        <input type="text" name="brand" required placeholder="เเบรนด์สินค้า">
                    </div>
                    <div class="input-box">
                        <p>ราคาสินค้า</p>
                        <input type="text" name="price" id="price" required placeholder="ราคา">
                    </div>
                    <div class="input-box">
                        <p>จำนวนคงเหลือ</p>
                        <input type="text" name="stock_qty" id="stock_qty" required placeholder="ยอดคงเหลือ" >
                    </div>
                    <div class="input-box">
                        <p>หน่วย</p>
                        <input type="text" name="unit" id="unit" required placeholder="หน่วย">
                    </div>
                    <div class="input-box">
                        <p>คำอธิบายรายการ</p>
                        <input type="text" name="description" id="description" required placeholder="คำอธิบายรายการ" >
                    </div>
                    <div class="button-box">
                        <a href="admin-product.php"><button type="button" class="exit-btn">ยกเลิก</button></a>
                        <button type="submit" class="sub-btn" name="sub-btn" id="sub-btn" >เพิ่มข้อมูลสินค้า</button>
                    </div>
                </div>
            </form>
     </div>
        
    </div>

</body>
</html>