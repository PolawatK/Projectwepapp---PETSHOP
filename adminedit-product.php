<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="style/editproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        if(!isset($_GET['product_id'])){
            header("refresh: 0; url=admin-product.php");
        }
        require 'conn.php';
        $sql = "SELECT * FROM product WHERE product_id='$_GET[product_id]'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
    <?php
        
    if (isset($_POST["sub-btn"])) {
    $sql_update="UPDATE product 
    SET product_name='$_POST[product_name]',
        category_id='$_POST[category_id]' ,
        brand='$_POST[brand]',price='$_POST[price]',
        stock_qty='$_POST[stock_qty]' ,unit='$_POST[unit]',
        description='$_POST[description]' 
        product_picture = '$product_picture'
    WHERE product_id='$_POST[product_id]' ";

    $result= $conn->query($sql_update);
        if(!$result) {
            die("Error God Damn it : ". $conn->error);
        } echo "<script>
            alert('อัพเดตข้อมูลสำเร็จ!');
            window.location.href = 'admin-product.php';
            </script>";
             exit;
    }
        ?>

<div class="container-bd">
        <div class="image-box">
        
        </div>
        <div class="regis-box">
            <form action="adminedit-product.php" method="post">
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
                    <button type="submit" class="sub-btn" name="sub-btn" id="sub-btn" >เเก้ไขข้อมูลสินค้า</button>
            </form>
     </div>
        
    </div>

</body>
</html>