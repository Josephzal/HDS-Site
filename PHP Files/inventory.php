<?php

    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';

    if(isset($_GET['id']))
    {    
         $id = $_GET['id'];
       
         $sql = "DELETE FROM products WHERE product_id = $id";
        if (!mysqli_query($conn, $sql)) {
            echo '<script>alert("Error Deleting Record!")</script>';
        }
         
    }
    
?>
<title>Inventory</title>

<?php

    $crud = new crud();
    $results = $crud->getInventory();

?> 

<body class="container-fluid">

<header>
    <?php
        include_once 'emp_navbar.php';
    ?>
</header>

<div class="container justify-content-center align-items-center">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                
                    <h1 class="mt-5 mb-5">Inventory</h1>
                <div class="page-header mt-5 mb-3 aCenter">
                    <a href="addForm.php" class="btn btn-primary">Add</a>
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Model</th>
                    <th scope="col">Serial</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Category</th>
                    <th scope="col">Cost</th>
                    <th scope="col">List Price</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if ($results->num_rows > 0): ?>
                    
                    <?php while($row = $results->fetch_assoc()): ?>
                        <tr>
                        
                        <!-- Display found product data -->
                        <td><?php echo $row['product_id'] ?></td>
                        <td><?php echo $row['prod_desc'] ?></td>
                        <td><?php echo $row['prod_model'] ?></td>
                        <td><?php echo $row['prod_serial'] ?></td>
                        <td><?php echo $row['manufacturer_name'] ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td><?php echo $row['cost'] ?></td>
                        <td><?php echo $row['list_price'] ?></td>
              
                        <td>
                            <a href="editForm.php?id=<?php echo $row['product_id'] ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="inventory.php?id=<?php echo $row['product_id'] ?>" class="btn btn-danger" name="delete">Delete</a>
                        </td>

                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                    <td colspan="3" rowspan="1" headers="">No Data Found</td>
                    </tr>
                    <?php endif; ?>
                    <?php mysqli_free_result($results); ?>
                </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>
   
</body>
</html>