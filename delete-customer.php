<?php
        require 'conn.php';
        $cus_id = $_POST['cus_id'];
        $conn->query("DELETE FROM order_detail WHERE order_id IN (SELECT order_id FROM orders WHERE cus_id = $cus_id)");
        $conn->query("DELETE FROM orders WHERE cus_id = $cus_id");
        $conn->query("DELETE FROM cart WHERE cus_id = $cus_id");
        $sql = "DELETE FROM customer WHERE cus_id = $cus_id";
        $result= $conn->query($sql);
        if(!$result) {
            die("Error God Damn it : ". $conn->error);
        } else {
            echo "<script>
            alert('ลบข้อมูลสำเร็จ!');
            window.location.href = 'admin-customer.php';
            </script>";
             exit;
        }
?>