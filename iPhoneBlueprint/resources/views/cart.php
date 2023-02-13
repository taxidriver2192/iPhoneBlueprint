<?php
$title = "Your Cart";
$description = "Cart";

ob_start();
?>

<h1 class="text-center my-5">Your Cart</h1>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $cart = session()->get('cart', []);
                    $total = 0;
                    foreach ($cart as $id => $details) {
                        $total += $details['price'] * $details['quantity'];
                        ?>
                        <tr>
                            <td><?php echo $details['name']; ?></td>
                            <td><?php echo $details['price']; ?></td>
                            <td>
                                <form action="<?php echo route('cart.update', ['product' => $id]); ?>" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="action" value="update">
                                    <input type="number" name="quantity" value="<?php echo $details['quantity']; ?>" class="form-control">
                                </form>
                            </td>
                            <td><?php echo $details['price'] * $details['quantity']; ?></td>
                            <td>
                                <form action="<?php echo route('cart.remove', ['product' => $id]); ?>" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="action" value="remove">
                                    <button type="submit" class="btn btn-danger">Remove from Cart</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3">Total</td>
                        <td><?php echo $total; ?></td>
                    </tr>
                </tbody
            </table>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$layoutPath = base_path() . '/resources/views/layout.php';
include $layoutPath;
?>
