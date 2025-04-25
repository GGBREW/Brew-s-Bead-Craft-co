<?php
require 'config.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // basic validation
  $title = trim($_POST['title']) ?: $errors[] = "Title is required.";
  $desc  = trim($_POST['description']);
  $price = floatval($_POST['price']) ?: $errors[] = "Price must be > 0.";
  $img   = trim($_POST['image_url']);

  if (empty($errors)) {
    $sql = "INSERT INTO bead_bags (title, description, price, image_url)
            VALUES (:title, :desc, :price, :img)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':title' => $title,
      ':desc'  => $desc,
      ':price' => $price,
      ':img'   => $img
    ]);
    header('Location: index.html');
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sell Your Bead Bag</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Sell Your Bead Bag</h1>
  <?php if ($errors): ?>
    <div class="errors">
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?php echo htmlspecialchars($e); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <form action="add_item.php" method="post">
    <label>Title<br>
      <input type="text" name="title" value="<?php echo htmlspecialchars($title ?? ''); ?>">
    </label><br><br>
    <label>Description<br>
      <textarea name="description"><?php echo htmlspecialchars($desc ?? ''); ?></textarea>
    </label><br><br>
    <label>Price (USD)<br>
      <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($price ?? ''); ?>">
    </label><br><br>
    <label>Image URL<br>
      <input type="url" name="image_url" value="<?php echo htmlspecialchars($img ?? ''); ?>">
    </label><br><br>
    <button type="submit">Post Listing</button>
  </form>
</body>
</html>
