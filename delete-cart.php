<?php
session_start();
require_once("conn.php");

if (!isset($_SESSION['cus_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['cart_id']) && isset($_POST['product_id'])) {
    $cart_id = $_POST['cart_id'];
    $product_id = $_POST['product_id'];

    $sql_delete = "DELETE FROM cart_item WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
    $result = $conn->query($sql_delete);

    if ($result) {
        $sql_total = "SELECT SUM(quantity * unit_price_snapshot) AS total 
                      FROM cart_item WHERE cart_id = '$cart_id'";
        $res_total = $conn->query($sql_total);
        $row_total = $res_total->fetch_assoc();

        $total_price = $row_total['total'];

        $conn->query("UPDATE cart SET total_price = '$total_price' WHERE cart_id = '$cart_id'");

        echo "<script>
            alert('ลบสินค้าสำเร็จ!');
            window.location.href = 'cart.php';
        </script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ไม่มีข้อมูลที่ต้องการลบ";
}
$conn->close();
?>