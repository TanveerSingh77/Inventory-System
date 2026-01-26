<?php
include 'config/db.php';
$res1=$conn->query("select count(*) as total from products");
$total_products=$res1->fetch_assoc()['total'];

$res2=$conn->query("select count(*) as low from products where current_stock<=min_stock");
$low_stock=$res2->fetch_assoc()['low'];

$res3=$conn->query("select count(*) as outstock from products where current_stock=0");
$out_stock=$res3->fetch_assoc()['outstock'];
?>

<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>
<div class="content">
    <h1>Inventory Dashboard</h1>
    <div class="cards">
        <div class="card">Total Products <br><?php echo $total_products ?></div>
        <div class="card low">Low Stock <br><?php echo $low_stock ?></div>
        <div class="card out">Out of Stock <br><?php echo $out_stock ?></div>
    </div>
</div>
<?php include 'include/footer.php'; ?>