<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $name, $price, $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
?>

<form method="POST" action="edit.php?id=<?php echo $id; ?>">
    <label for="name">Nama Produk:</label>
    <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
    <label for="price">Harga Produk:</label>
    <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required>
    <input type="submit" value="Update Produk">
</form>
 