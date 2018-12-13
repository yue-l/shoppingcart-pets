<?php
namespace views;

/**
 * shopping cart page renders user selected products from session variable.
 * @var cartSum used to display total sum
 */

$cartSum = 0;
?>
<h3>My Shopping Cart</h4>
<table style="width:60%; border: 1px solid black;">
    <tr>
        <th>Product Name</th>
        <th>Unit Price</th>
        <th>Quatity</th>
        <th>Total</th>
        <th></th>
    </tr>
        <?php foreach($_SESSION['shopping_cart']['selected'] as $tempProduct): ?>
            <?php
                $jsonItem = (object) $tempProduct;
                $cartSum += $jsonItem->total;
            ?>
            <tr>
                <form action="handlers/remove_item_request.php" method="post">
                    <input type="text" style="display:none;" name="name" value="<?php echo $jsonItem->name;?>"/>
                    <input type="text" style="display:none;" name="price" value="<?php echo $jsonItem->price;?>"/>
                    <td><?php echo $jsonItem->name;?></td>
                    <td><?php echo $jsonItem->price;?></td>
                    <td><?php echo $jsonItem->quatity;?></td>
                    <td>$ <?php echo number_format($jsonItem->total, 2, '.', ',');?></td>
                    <td>
                        <input type="submit" value="Remove">
                    </td>
                </form>
            </tr>
        <?php endforeach;?>
        <tr>
            <td colspan=3> Sum</td>
            <td colspan=1>$ <?= number_format($cartSum, 2, '.', ',');?> </td>
            <td colspan=1></td>
        </tr>
</table>
