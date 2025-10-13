<?php
require_once("conn.php");
session_start();

if (!isset($_SESSION['cus_id'])) {
    header("Location: login.php");
    exit();
}

$cus_id = $_SESSION['cus_id'];
$product_id = $_POST['product_id'];


$sql_price = "SELECT price FROM product WHERE product_id = '$product_id'";
$result_price = $conn->query($sql_price);
$row_price = $result_price->fetch_assoc();
$price_snapshot = $row_price['price'];


$sql_cart = "SELECT cart_id FROM cart WHERE cus_id = '$cus_id'";
$result_cart = $conn->query($sql_cart);

if ($result_cart->num_rows > 0) {
    $cart_row = $result_cart->fetch_assoc();
    $current_cart_id = $cart_row['cart_id'];
} else {
    $sql_create_cart = "INSERT INTO cart (cus_id, total_price) VALUES ('$cus_id', 0)";
    $conn->query($sql_create_cart);
    $current_cart_id = $conn->insert_id;
}

$sql_check_item = "SELECT * FROM cart_item WHERE cart_id = '$current_cart_id' AND product_id = '$product_id'";
$result_item = $conn->query($sql_check_item);

if ($result_item->num_rows > 0) {
    $sql_update = "UPDATE cart_item SET quantity = quantity + 1 WHERE cart_id = '$current_cart_id' AND product_id = '$product_id'";
    $conn->query($sql_update);
} else {
    $sql_insert = "INSERT INTO cart_item (cart_id, product_id, quantity, unit_price_snapshot)
                   VALUES ('$current_cart_id', '$product_id', 1, '$price_snapshot')";
    $conn->query($sql_insert);
}

$sql_total = "SELECT SUM(quantity * unit_price_snapshot) AS total, SUM(quantity) AS total_qty 
              FROM cart_item WHERE cart_id = '$current_cart_id'";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();

$total_price = $row_total['total'];
$total_qty = $row_total['total_qty'];

$conn->query("UPDATE cart SET total_price = '$total_price' WHERE cart_id = '$current_cart_id'");


echo "<script>
    alert('เพิ่มสินค้าลงตะกร้าเรียบร้อยแล้ว!');
    window.history.back();;
</script>";

$conn->close();
?>
