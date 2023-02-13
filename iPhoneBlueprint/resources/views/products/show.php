<?php
$title = "Product: " . $product->name;
$description = "Details for product " . $product->name . " including model, price, and description.";
ob_start();
?>
<div class="container my-5">
    <h1 class="text-center mb-5"><?php echo  $product->name; ?></h1>
    <div class="row">
        <div class="col-md-4 mb-3">
            <img src="<?php echo asset('images/' . $product->image); ?>" alt="<?php echo $product->name; ?>" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p><?php echo $product->description; ?></p>
            <p>Price: <?php echo $product->price; ?></p>
            <p>Model: <?php echo $product->model; ?></p>
            <form action="<?php echo route('cart.add', ['product' => $product->id]); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="action" value="add">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
$layoutPath = base_path() . '/resources/views/layout.php';
include $layoutPath;
?>
