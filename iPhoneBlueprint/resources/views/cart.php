<h1>Your Cart</h1>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
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
                <td><?php echo $details['quantity']; ?></td>
                <td><?php echo $details['price'] * $details['quantity']; ?></td>
            </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="3">Total</td>
            <td><?php echo $total; ?></td>
        </tr>
    </tbody>
</table>
