<?php
        require 'conn.php';
        $product_id = $_POST['product_id'];
        $sql = "DELETE FROM product WHERE product_id='$product_id'";
        $result= $conn->query($sql);
        if(!$result) {
            die("Error God Damn it : ". $conn->error);
        } else {
            echo "<script>
            alert('ลบข้อมูลสำเร็จ!');
            window.location.href = 'admin-product.php';
            </script>";
             exit;
        }
?>