<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $password = htmlspecialchars($_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Hasil Input</h2>
        <p><strong>Nama Lengkap:</strong> <?php echo $name; ?></p>
        <p><strong>Usia:</strong> <?php echo $age; ?></p>
        <p><strong>Password:</strong> <?php echo str_repeat('*', strlen($password)); ?></p>
        <a href="index.html" class="btn">Kembali ke Form</a>
    </div>
</body>
</html>
