<?php
include 'config/db.php';
$message="";

if ($_SERVER['REQUEST_METHOD']=='POST') 
    {
        $product_id=(int)$_POST['product_id'];
        $quantity=(int)$_POST['quantity'];
        $note=trim($_POST['note']);

        if ($product_id<=0 || $quantity<=0) 
        {
            $message="Invalid input. Please select a product and enter a quantity greater than 0.";
        }
        else 
        {
            $sqlInsert="insert into stock_movements (product_id, type, quantity, date, note) values (?, 'IN', ?, CURDATE(), ?)";
            $stmtInsert=$conn->prepare($sqlInsert);

            if (!$stmtInsert) 
            {
                $message="Prepare failed: ".$conn->error;
            } 
            else 
            {
                $stmtInsert->bind_param("iis",$product_id,$quantity,$note);
                if (!$stmtInsert->execute()) 
                {
                    $message ="Insert Failed: ".$stmtInsert->error;
                } 
                else 
                {
                    $sqlUpdate="update products set current_stock=current_stock + ? where id= ?";
                    $stmtUpdate=$conn->prepare($sqlUpdate);

                if (!$stmtUpdate) 
                {
                    $message="Prepare failed (update): ".$conn->error;
                } 
                else 
                {
                    $stmtUpdate->bind_param("ii",$quantity,$product_id);
                    if (!$stmtUpdate->execute()) 
                    {
                        $message="Update Failed: ".$stmtUpdate->error;
                    } 
                    else 
                    {
                        $message="Stock added successfully!";
                    }
                }
            }
        }
    }
}
?>

<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>

<div class="content">
    <h2>Add Stock</h2>

    <?php if (!empty($message)): ?>
        <p style="padding:10px; background:#fff; border:1px solid #ccc;">
            <strong><?php echo $message; ?></strong>
        </p>
    <?php endif; ?>

    <form method="post">
        Product: <br>
        <select name="product_id" required>
            <option value="">-- Select Product --</option>
            <?php
            $products=$conn->query("select id, name from products order by name asc");
            while ($p=$products->fetch_assoc()) 
            {
                echo "<option value='{$p['id']}'>{$p['name']}</option>";
            }
            ?>
        </select><br><br>

        Quantity: <br>
        <input type="number" name="quantity" min="1" required><br><br>

        Note (optional): <br>
        <input type="text" name="note"><br><br>

        <button type="submit">Add Stock</button>
    </form>
</div>

<?php include 'include/footer.php'; ?>
