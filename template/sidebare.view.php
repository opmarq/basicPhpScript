<div class="list-group">
        <h4  class="list-group-item list-group-title">Categories</h4>

        <?php foreach (getAllCategories($conn) as $value): ?>
        
                <a href="index.php?cat=<?= $value->id ?>" class="list-group-item"><?= $value->name; ?></a>

        <?php endforeach; ?>
        <?php
?>

</div>