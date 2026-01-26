<?php 
include 'config/db.php'; 
$message='';

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=trim($_POST['name']);
    $category=trim($_POST['category']);
    $min_stock=(int)$_POST['min_stock'];


    if ($min_stock<0)
    {
        $message="Invalid Stock Level";
    }
    else
    {
        $sqlInsert="insert into products (name, category, min_stock) values (?, ?, ?)";
        $stmtInsert=$conn->prepare($sqlInsert);

        if (!$stmtInsert) 
        {
            $message="SQL Prepare Error: ".$conn->error;
        }
        else
        {
            $stmtInsert->bind_param("ssi",$name,$category,$min_stock);
            if (!$stmtInsert->execute()) 
            {
                $message="Insert Failed ".$stmtInsert->error;
            } 
            else
            {
                $message="Product added successfully!";
            }
        }
    }
}
  
?>

<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>
<div class="content">
    <h2>Add Product</h2>
    <?php if ($message!=""): ?>
        <p style="padding:10px;background:#fff;border:1px solid #ccc;">
            <strong><?php echo $message; ?></strong>
        </p>
    <?php endif; ?>

        <form method="post">
            Product Name: <input type="text" name='name' required><br><br>
            Catergory: <input type="text" name='category' required><br><br>
            Minimum Stock: <input type="number" name='min_stock' value="10"><br><br>
            <button type="submit" name="add">ADD PRODUCT</button>
        </form>
</div>
<?php include 'include/footer.php'; ?>