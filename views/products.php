<?php
namespace views;

/**
 * this partial view renders available products for user to add.
 */
?>
<h3>Available Products</h4>
<table style="width:60%; border: 1px solid black;">
    <tr>
        <th>Product Name</th>
        <th>Unit Price</th>
        <th></th>
    </tr>
        <?php foreach($resultProducts as $tempProduct): ?>
            <tr>
                <form action="handlers/add_item_request.php" method="post">
                    <input type="text" style="display:none;" name="name" value="<?php echo $tempProduct->name;?>"/>
                    <input type="text" style="display:none;" name="price" value="<?php echo $tempProduct->price;?>"/>
                    <td><?php echo $tempProduct->name;?></td>
                    <td>$ <?php echo $tempProduct->price;?></td>
                    <td>
                        <input type="submit" value="Add">
                    </td>
                </form>
            </tr>
        <?php endforeach;?>
</table>
