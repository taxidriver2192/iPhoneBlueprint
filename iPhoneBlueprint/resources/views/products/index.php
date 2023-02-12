<h1>All Products</h1>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <a href="<?php echo route('products.show', $product->id); ?>"><?php echo $product->name; ?></a>
        </li>
    <?php endforeach; ?>
</ul>
