<?php
include 'config/db.php';
$products=$conn->query("Select * from products;");
$message='';
?>

<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>
<div class="content">
    <h2>Show Products</h2>
    <?php if ($message!=""): ?>
        <p><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>

        <table border="1" cellpadding="8">
            <tr align="center">
                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Current Stock</th>
                <th>Min Stock</th>
            </tr>
            <?php while($p=$products->fetch_assoc()) { ?>
            <tr align="center">
                <td><?php echo $p['id'] ?></td>
                <td><?php echo $p['name'] ?></td>
                <td><?php echo $p['category'] ?></td>
                <td><?php echo $p['current_stock'] ?></td>
                <td><?php echo $p['min_stock'] ?></td>
            </tr>
            <?php } ?>
        </table>
</div>
<?php include 'include/footer.php'; ?>


