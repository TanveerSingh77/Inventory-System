<?php
include 'config/db.php';
$stock_movement=$conn->query("Select * from Stock_movements");
$message='';
?>

<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>
<div class="content">
    <h2>Show Stock Movement</h2>
    <?php if ($message!=""): ?>
        <p><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>

        <table border="1" cellpadding="8">
            <tr align="center">
                <th>Id</th>
                <th>Product Id</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Note</th>
            </tr>
            <?php while($p=$stock_movement->fetch_assoc()) { ?>
            <tr align="center">
                <td><?php echo $p['id'] ?></td>
                <td><?php echo $p['product_id'] ?></td>
                <td><?php echo $p['type'] ?></td>
                <td><?php echo $p['quantity'] ?></td>
                <td><?php echo $p['note'] ?></td>
                <td><?php echo $p['date'] ?></td>
            </tr>
            <?php } ?>
        </table>
</div>
<?php include 'include/footer.php'; ?>