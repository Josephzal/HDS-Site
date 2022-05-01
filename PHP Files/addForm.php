<?php

    include_once 'dbh.inc.php';
    include_once 'head.php';

    if(isset($_POST['add']))
{    
     $categoryID = $_POST['categoryID'];
     $manufacturerID = $_POST['manufacturerID'];
     $model = $_POST['model'];
     $serial = $_POST['serial'];
     $desc = $_POST['desc'];
     $cost = $_POST['cost'];
     $listPrice = $_POST['listPrice'];
  
     $sql = "INSERT INTO products (category_id, manufacturer_id, prod_model, 
     prod_serial, prod_desc, cost, list_price)
     VALUES ('$categoryID', '$manufacturerID', '$model', '$serial', '$desc', '$cost', '$listPrice')";
     if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Successfully Edited Record!");
            window.location.href="inventory.php"</script>';
     } else {
        echo '<script>alert("Error Adding Record!")</script>';
     }
     
}
    
?>
<title>Add Product</title>

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
                    <h1>Add Product</h1>
                </div>

                <form method="post">

                <div class="mb-3 col-xs-2">
                    <label for="categoryID" class="form-label">Category ID</label>
                    <input type="text" class="form-control" name="categoryID">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="manufacturerID" class="form-label">Manufacturer ID</label>
                    <input type="text" class="form-control" name="manufacturerID">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" name="model">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="serial" class="form-label">Serial</label>
                    <input type="text" class="form-control" name="serial">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="desc" class="form-label">Description</label>
                    <input type="text" class="form-control" name="desc">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="cost" class="form-label">Cost</label>
                    <input type="text" class="form-control" name="cost">
                </div>

                <div class="mb-3 col-xs-2">
                    <label for="listPrice" class="form-label">List Price</label>
                    <input type="text" class="form-control" name="listPrice">
                </div>

                <div class="mt-5 aCenter">
                <button class="btn btn-primary" type="submit" name="add">Add</button>
                </div>
                </form>

            </div>
        </div>        
    </div>
</div>
   
</body>
</html>