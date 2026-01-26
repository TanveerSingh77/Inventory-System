<?php 
include 'config/db.php';

$result=$conn->query("select name,category,current_stock,min_stock from products where current_stock<=min_stock;");
$message='';
?>

<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>
<div class="content">
    <h2>Low Stock Alert</h2>
    <?php if ($message!=""): ?>
        <p><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>

        <table border="1" cellpadding="8">
            <tr align="center">
                <th>Name</th>
                <th>Category</th>
                <th>Current Stock</th>
                <th>Min Stock</th>
            </tr>
            <?php if ($result->num_rows > 0) { ?>
            <?php while($p=$result->fetch_assoc()) { ?>
            <tr style="color:red;" align="center">
                <td><?php echo $p['name'] ?></td>
                <td><?php echo $p['category'] ?></td>
                <td><?php echo $p['current_stock'] ?></td>
                <td><?php echo $p['min_stock'] ?></td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr align="center">
                <td colspan="5">All stocks are sufficient</td>
            </tr>
            <?php } ?>
        </table>
</div>
<?php include 'include/footer.php'; ?>