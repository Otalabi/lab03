<?php include '../view/header.php'; ?>
<div id="main">
    <h1>Product List</h1>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($all_products as $product) : ?>
                <tr>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['version']; ?></td>
                    <td><?php echo date ("m/d/Y",strtotime($product['releaseDate']));?></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action" value="delete_record"/>
                            <input type="hidden" name="product_item" value="<?php echo $product['productCode']; ?>"/>
                            <input type="submit" value="Delete"/>
                        </form></td>
                </tr>
            <?php endforeach; ?>
        </table>
            <h1>Add Product</h1>
            <form action="." method="post" id="aligned">
                <input type="hidden" name="action" value="add_record"/>
                <label>Code:</label>
                <input type="input" name="product_item" autofocus/> <br/>
                <label>Name:</label>
                <input type="input" name="name"/> <br/>
                <label>Version:</label>
                <input type="input" name="version"/> <br/>
                <label>Release Date:</label>
                <input type="input" name="release_date"/>&nbsp;<span>Use 'yyyy-mm-dd' format</span><br/>
                <label>&nbsp;</label>
                <input type="submit" value="Add Product"/>
            </form>
                <span class="error"><?php if(isset($_GET['error']))
                    echo $_GET['error']; ?></span>
</div>
<?php include '../view/footer.php'; ?>
