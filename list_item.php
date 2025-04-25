<?php
require 'config.php';

// fetch all bags
$stmt = $pdo->query("SELECT * FROM bead_bags ORDER BY created_at DESC");
$bags = $stmt->fetchAll();

foreach ($bags as $bag): ?>
  <div class="bag-card">
    <?php if ($bag['image_url']): ?>
      <img src="<?php echo htmlspecialchars($bag['image_url']); ?>" alt="">
    <?php endif; ?>
    <h2><?php echo htmlspecialchars($bag['title']); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($bag['description'])); ?></p>
    <div class="price">$<?php echo number_format($bag['price'], 2); ?></div>
  </div>
<?php endforeach; ?>
