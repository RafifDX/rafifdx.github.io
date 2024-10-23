<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, price) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $price);

    if ($stmt->execute()) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
?>

<form method="POST" action="tambah.php">
    <label for="name">Nama Produk:</label>
    <inp
