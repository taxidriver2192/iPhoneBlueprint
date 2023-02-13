<?php
$title = "All Products";
$description = "Cart";

ob_start();
?>

<h1>All Products</h1>
<div class="row">
    <?php foreach ($products as $product): ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <img class="card-img-top" src="<?php echo asset('images/' . $product->image); ?>" alt="<?php echo $product->name; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product->name; ?></h5>
                    <p class="card-text"><?php echo $product->description; ?></p>
                    <h6 class="card-subtitle mb-2 text-muted">$<?php echo $product->price; ?></h6>
                    <a href="<?php echo route('products.show', $product->id); ?>" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
$layoutPath = base_path() . '/resources/views/layout.php';
include $layoutPath;
?>
