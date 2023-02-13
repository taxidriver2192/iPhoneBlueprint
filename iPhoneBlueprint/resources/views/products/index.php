<?php
$title = "All Products";
$description = "Cart";

ob_start();
?>

<h1>All Products</h1>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <a href="<?php echo route('products.show', $product->id); ?>"><?php echo $product->name; ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
$layoutPath = base_path() . '/resources/views/layout.php';
include $layoutPath;
?>
