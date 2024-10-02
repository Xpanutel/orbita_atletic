<?php
require 'Auth.php'; // Подключение к базе данных

$dsn = 'mysql:host=localhost;dbname=orbita_atletic';
$username = 'your_username';
$password = 'your_password';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $trainerId = $_POST['trainer_id'];
    $avatar = $_FILES['avatar'];

    // Проверка на ошибки загрузки файла
    if ($avatar['error'] !== UPLOAD_ERR_OK) {
        die('File upload error: ' . $avatar['error']);
    }

    // Проверка типа файла
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($avatar['type'], $allowedTypes)) {
        die('Invalid file type. Only JPEG, PNG, and GIF are allowed.');
    }

    // Путь для сохранения файла
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($avatar['name']);

    // Перемещение файла в целевую директорию
    if (move_uploaded_file($avatar['tmp_name'], $uploadFile)) {
        // Обновление пути к аватарке в базе данных
        $stmt = $db->prepare("UPDATE trainers SET avatar_path = ? WHERE id = ?");
        $stmt->execute([$uploadFile, $trainerId]);

        echo 'Avatar uploaded successfully!';
    } else {
        echo 'Failed to upload avatar.';
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Upload Avatar</h2>
    <form method="post" enctype="multipart/form-data" action="upload_avatar.php">
        <input type="hidden" name="trainer_id" value="1"> <!-- Замените на ID тренера -->
        <input type="file" name="avatar" required>
        <button type="submit">Upload Avatar</button>
    </form>
</body>
</html>
