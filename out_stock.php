<?php
include 'config/db.php';
$products=$conn->query("SELECT id, name FROM products");
$message='';

if ($_SERVER['REQUEST_METHOD']=="POST")
    {
        $product_id=(int)$_POST['product_id'];
        $quantity=(int)$_POST['quantity'];
        $note=trim($_POST['note']);

        if ($product_id<=0 || $quantity<=0)
        {
            $message="Invalid Input";
        }

        $sqlSelect="select current_stock from products where id=?;";
        $stmtSelect=$conn->prepare($sqlSelect);
        if (!$sqlSelect)
        {
            $message="SQL Prepare Error: ".$conn->error;
        }
        else
        {
            $stmtSelect->bind_param("i",$product_id);
            if (!$stmtSelect->execute())
            {
                $message="Selection Failed ".$stmtSelect->error;
            }
            else
            {
                $result=$stmtSelect->get_result();
                $row=$result->fetch_assoc();
                if(!$row)
                {
                    $message="Product not found";
                }

                $current_stock=$row['current_stock'];
        
                if ($quantity>$current_stock) 
                {
                    $message="Error: Not enough stock available";
                }
                else
                {
                    $sqlInsert="Insert into stock_movements(product_id,type,quantity,date,note) values (?, 'OUT', ?, CURDATE(), ?);";
                    $stmtInsert=$conn->prepare($sqlInsert);

                    if(!$stmtInsert)
                    {
                        $message="Prepare failed=: ".$conn->error;
                    }
                    else
                    {
                        $stmtInsert->bind_param("iis",$product_id,$quantity,$note);
                        if (!$stmtInsert->execute())
                        {
                            $message="Insert Failed ".$stmtInsert->error;
                        }
                        else
                        {
                            $sqlUpdate="Update products set current_stock=current_stock-? where id=?;";
                            $stmtUpdate=$conn->prepare($sqlUpdate);
                            if (!$stmtUpdate) 
                            {
                                $message="Prepare failed: ".$conn->error;
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
                                    $message="Stock Removed Successfully";
                                }
                            }
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
    <h2>Remove Stock</h2>
    <?php if ($message!=""): ?>
        <p style="padding:10px;background:#fff;border:1px solid #ccc;">
            <strong><?php echo $message; ?></strong>
        </p>
    <?php endif; ?>

        <form method="post">
            Product:
            <select name="product_id" required>
                <option value="">Select</option>
                    <?php while($p=$products->fetch_assoc()) { ?>
                            <option value="<?php echo $p['id'] ?>">
                                <?php echo $p['name'] ?>
                            </option>
                    <?php } ?>
            </select><br><br>

        Quantity:
        <input type="number" name="quantity" min="1" required><br><br>

        Note:
        <input type="text" name="note"><br><br>
        <button type="submit">REMOVE STOCK</button>
        </form>
</div>
<?php include 'include/footer.php'; ?>


