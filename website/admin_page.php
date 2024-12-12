

<?php
session_start();
require 'db_config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['upload_image'])) {
        $image = $_FILES['image']['name'];
        $target = 'uploads/' . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $stmt = $conn->prepare("INSERT INTO gallery (image_url) VALUES (:image_url)");
            $stmt->bindParam(':image_url', $target);
            if ($stmt->execute()) {
                $message = "Image uploaded successfully!";
            } else {
                $message = "Failed to upload image.";
            }
        } else {
            $message = "Failed to move the uploaded file.";
        }
    }

    if (isset($_POST['add_portfolio'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
    
        $stmt = $conn->prepare("INSERT INTO portfolio (title, description, category) VALUES (:title, :description, :category)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        if ($stmt->execute()) {
            $message = "Portfolio item added successfully!";
        } else {
            $message = "Failed to add portfolio item.";
        }
    }
    

    if (isset($_POST['delete_message'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM contact WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $message = "Message deleted successfully!";
        } else {
            $message = "Failed to delete message.";
        }
    }

    if (isset($_POST['edit_message'])) {
        $id = $_POST['id'];
        $new_message = $_POST['new_message'];

        $stmt = $conn->prepare("UPDATE contact SET message = :message WHERE id = :id");
        $stmt->bindParam(':message', $new_message);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $message = "Message updated successfully!";
        } else {
            $message = "Failed to update message.";
        }
    }
}

// Fetch messages from the contact table
$stmt = $conn->query("SELECT * FROM contact ORDER BY id DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #444;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input,
        .form-group textarea,
        .form-group button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table .actions {
            display: flex;
            gap: 5px;
        }

        table .actions button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        table .actions .edit-btn {
            background-color: #ffc107;
            color: white;
        }

        table .actions .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .message {
            color: green;
            margin-bottom: 10px;
            text-align: center;
        }

        .logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        .logout:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
     <!-- Navigation -->
     <nav class="text-center">
        <a href="index.php">Home</a>
        <a href="gallery.php">Gallery</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="contact.php">Contact</a>
        <a href="admin_login.php">Admin Login</a>
    </nav>
    <main>
    <div class="container">
        <h2>Admin Panel</h2>

        <?php if (!empty($message)): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data" class="form-group">
            <h3>Upload Image to Gallery</h3>
            <input type="file" name="image" required>
            <button type="submit" name="upload_image">Upload</button>
        </form>

        <form method="post" class="form-group">
            <h3>Add to Portfolio</h3>
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="text" name="category" placeholder="Category" required>
            <button type="submit" name="add_portfolio">Add</button>
        </form>


        <h3>Contact Messages</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($messages) > 0): ?>
                    <?php foreach ($messages as $msg): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($msg['id']); ?></td>
                            <td><?php echo htmlspecialchars($msg['name']); ?></td>
                            <td><?php echo htmlspecialchars($msg['email']); ?></td>
                            <td><?php echo htmlspecialchars($msg['message']); ?></td>
                            <td><?php echo htmlspecialchars($msg['created_at'] ?? 'N/A'); ?></td>
                            <td class="actions">
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $msg['id']; ?>">
                                    <input type="text" name="new_message" placeholder="Edit message" required>
                                    <button type="submit" name="edit_message" class="edit-btn">Edit</button>
                                </form>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $msg['id']; ?>">
                                    <button type="submit" name="delete_message" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No messages found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
                </main>

        <a href="logout.php" class="logout">Logout</a>
    </div>
     <!-- Footer -->
     <footer>
        <p>&copy; 2024 Captured Moments. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>
