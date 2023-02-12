<h1><?php echo $product->name; ?></h1>
<p><?php echo $product->description; ?></p>
<p>Price: <?php echo $product->price; ?></p>
<p>Model: <?php echo $product->model; ?></p>
<img src="<?php echo asset('images/' . $product->image); ?>" alt="<?php echo $product->name; ?>">

<form action="<?php echo route('cart.add', ['product' => $product->id]); ?>" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="action" value="add">
    <button type="submit">Add to Cart</button>
</form>


<form action="<?php echo route('cart.remove', ['product' => $product->id]); ?>" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="_method" value="delete">
    <button type="submit">Remove from Cart</button>
</form>

<a href="/cart">View Cart</a>
