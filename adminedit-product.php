<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เเก้ไขข้อมูลสินค้า</title>
    <link rel="stylesheet" href="style/editproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        require 'conn.php';
        if(!isset($_GET['product_id'])){
            header("refresh: 0; url=admin-product.php");
            
        }
        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM product WHERE product_id='$product_id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
    <?php
        
    if (isset($_POST["sub-btn"])) {
        $product_id = $_POST['product_id'];

        $result_old = mysqli_query($conn, "SELECT image_url FROM product WHERE product_id='$product_id'");
        $old_data = mysqli_fetch_assoc($result_old);
        $old_picture = $old_data['image_url'];

        if (!empty($_FILES["uploadfile"]["name"])) {
            $image_url = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
        } else {
            $image_url = $old_picture;
            $tempname = null;
        }

        $sql_update="UPDATE product 
        SET product_name='$_POST[product_name]',
            category_id='$_POST[category_id]' ,
            brand='$_POST[brand]',price='$_POST[price]',
            stock_qty='$_POST[stock_qty]' ,unit='$_POST[unit]',
            description='$_POST[description]',
            image_url = '$image_url'
        WHERE product_id='$_POST[product_id]' ";

        $folder = "img/Productimg/" . basename($image_url);
        $result= $conn->query($sql_update);
        if (mysqli_query($conn, $sql_update)) {
            move_uploaded_file($tempname, $folder);
            if(!$result) {
                die("Error God Damn it : ". $conn->error);
            }
            header("Location: admin-product.php");
            exit;
        }
    }
 ?>

<div class="container-bd">
        <div class="regis-box">
            <form action="adminedit-product.php" enctype="multipart/form-data" method="post" onsubmit="return confirm('ต้องการแก้ไขข้อมูลสินค้า <?= addslashes($row['product_name'] ) ?> หรือไม่?')">
                <div class="image-box">
                    <h1>รูปภาพสินค้า</h1>
                    <div class ="product-box">
                        <img src="img/Productimg/<?=$row['image_url'];?>" alt="Product Image">
                    </div>
                    <div class="input_box">
                        <input type="file" class="custom-file-input" name="uploadfile" id="upload-btn" value="<?=$row['image_url'];?>">
                    </div>
                </div>
                <div class="data-box">
                    <h1>เเก้ไขข้อมูลสินค้า</h1>
                    <div class="input-box-name">
                        <div class="left">
                        <p>ชื่อสินค้า</p>
                        <input type="text" name="product_id" id="product_id" value="<?=$row['product_id'];?>" hidden>
                        <input type="text" name="product_name" class="product_name" required placeholder="ชื่อสินค้า" value="<?=$row['product_name'];?>">
                        </div>
                        <div class="right">
                        <p>รหัสประเภทสินค้า</p>
                        <input type="text" name="category_id" class="category_id" required placeholder="รหัสประเภทสินค้า" value="<?=$row['category_id'];?>">
                        </div>  
                    </div>
                    <div class="input-box">
                        <p>เเบรนด์สินค้า</p>
                        <input type="text" name="brand" required placeholder="เเบรนด์สินค้า" value="<?=$row['brand'];?>">
                    </div>
                    <div class="input-box">
                        <p>ราคาสินค้า</p>
                        <input type="text" name="price" id="price" required placeholder="ราคา" value="<?=$row['price'];?>">
                    </div>
                    <div class="input-box">
                        <p>จำนวนคงเหลือ</p>
                        <input type="text" name="stock_qty" id="stock_qty" required placeholder="ยอดคงเหลือ" value="<?=$row['stock_qty'];?>">
                    </div>
                    <div class="input-box">
                        <p>หน่วย</p>
                        <input type="text" name="unit" id="unit" required placeholder="หน่วย" value="<?=$row['unit'];?>">
                    </div>
                    <div class="input-box">
                        <p>คำอธิบายรายการ</p>
                        <input type="text" name="description" id="description" required placeholder="คำอธิบายรายการ" value="<?=$row['description'];?>">
                    </div>
                    <div class="button-box">
                        <a href="admin-product.php"><button type="button" class="exit-btn">ยกเลิก</button></a>
                        <button type="submit" class="sub-btn" name="sub-btn" id="sub-btn" >เเก้ไขข้อมูลสินค้า</button>
                    </div>
                </div>
            </form>
     </div>
        
    </div>

</body>
</html>