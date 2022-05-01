<?php

    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
    $crud = new crud();
    $result = $crud->getProduct($_GET['id']);
    $prodRes = $result->fetch_assoc();
    $res = $_GET['id'];

    if(isset($_POST['edit']))
    {    
        $categoryID = $_POST['categoryID'];
        $manufacturerID = $_POST['manufacturerID'];
        $model = $_POST['model'];
        $serial = $_POST['serial'];
        $desc = $_POST['desc'];
        $cost = $_POST['cost'];
        $listPrice = $_POST['listPrice'];
         
         $sql = "UPDATE products 
         SET category_id = '$categoryID', manufacturer_id = '$manufacturerID', prod_model = '$model', prod_serial = '$serial',
         prod_desc = '$desc', cost = '$cost', list_price = '$listPrice'
         WHERE product_id = $res";
         if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Successfully Edited Record!");
            window.location.href="inventory.php"</script>';
         } else {
            echo '<script>alert("Error Editing Record!")</script>';
         }
         
    }
    
?>
<title>Edit Product</title>

<body class="container-fluid">

<header>
    <?php
        include_once 'emp_navbar.php';
    ?>
</header>

<div class="container justify-content-center align-items-center" style="width: 50%;">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header mt-5 mb-5">
                    <h1>Edit Product</h1>
                </div>

                <form method="post">
                <div class="mb-3 col-xs-2">
                    <label for="productID" class="form-label">Product ID</label>
                    <input type="text" class="form-control" name="productID" value="<?php echo $prodRes['product_id']?>"disabled>
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="categoryID" class="form-label">Category ID</label>
                    <input type="text" class="form-control" name="categoryID" value="<?php echo $prodRes['category_id']?>">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="manufacturerID" class="form-label">Manufacturer ID</label>
                    <input type="text" class="form-control" name="manufacturerID" value="<?php echo $prodRes['manufacturer_id']?>">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" name="model" value="<?php echo $prodRes['prod_model']?>">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="serial" class="form-label">Serial</label>
                    <input type="text" class="form-control" name="serial" value="<?php echo $prodRes['prod_serial']?>">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="desc" class="form-label">Description</label>
                    <input type="text" class="form-control" name="desc" value="<?php echo $prodRes['prod_desc']?>">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="cost" class="form-label">Cost</label>
                    <input type="text" class="form-control" name="cost" value="<?php echo $prodRes['cost']?>">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="listPrice" class="form-label">List Price</label>
                    <input type="text" class="form-control" name="listPrice" value="<?php echo $prodRes['list_price']?>">
                </div>

                <div class="mt-5 aCenter">
                <button onClick="inventory.php" class="btn btn-primary" type="submit" name="edit">Edit</button>
                </div>
                </form>

            </div>
        </div>        
    </div>
</div>
   
</body>
</html>