<?php
session_start();
require_once("conn.php");

if (!isset($_SESSION['cus_id'])) {
    header("Location: login.php");
    exit();
}

$cus_id = $_SESSION['cus_id'];
$sql_cart = "SELECT * FROM cart WHERE cus_id = '$cus_id'";
$result_cart = $conn->query($sql_cart);

if ($result_cart->num_rows == 0) {
    echo "<script>alert('ไม่มีสินค้าในตะกร้า'); window.location.href='cart.php';</script>";
    exit();
}

$cart = $result_cart->fetch_assoc();
$cart_id = $cart['cart_id'];


$sql_items = "SELECT * FROM cart_item WHERE cart_id = '$cart_id'";
$result_items = $conn->query($sql_items);

if ($result_items->num_rows == 0) {
    echo "<script>alert('ไม่มีสินค้าในตะกร้า'); window.location.href='cart.php';</script>";
    exit();
}


$total = 0;
while ($row = $result_items->fetch_assoc()) {
    $total += $row['quantity'] * $row['unit_price_snapshot'];
}

$sql_order = "INSERT INTO orders (cus_id, order_date, total_price)
              VALUES ('$cus_id', NOW(), '$total')";
$conn->query($sql_order);
$order_id = $conn->insert_id; 

$result_items = $conn->query("SELECT * FROM cart_item WHERE cart_id = '$cart_id'");
while ($item = $result_items->fetch_assoc()) {
    $product_id = $item['product_id'];
    $qty = $item['quantity'];
    $price = $item['unit_price_snapshot'];
    $subtotal = $qty * $price;

    $sql_detail = "INSERT INTO order_detail (order_id, product_id, quantity, unit_price, subtotal)
                   VALUES ('$order_id', '$product_id', '$qty', '$price', '$subtotal')";
    $conn->query($sql_detail);
}

$conn->query("DELETE FROM cart_item WHERE cart_id='$cart_id'");

echo "<script>
    alert('สั่งซื้อสำเร็จ! หมายเลขคำสั่งซื้อคือ #$order_id');
    window.location.href='cart.php';
</script>";

$conn->close();
?>
