<?php
    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
?>

<title>Generated Customer Report</title>

<body class="container-fluid">

<header>
    <?php
        include_once 'emp_navbar.php';
    ?>
</header>

<?php

    $crud = new crud();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $crud->getCustReport($id);
        $prodResult = $crud->getCustProdReport($id);
    } else{
        echo "<h1 class='text-danger'>Please check details and try again!</h1>";
    };

?>

<div class="container justify-content-center align-items-center">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                <h1 class="mt-5 mb-5">Report for <?php echo $result['first_name'] . ' ' .$result['last_name']; ?></h1>
                </div>
                <table class="table table-striped">
                <thead>
                    <p class="custDescText">Customer Information</p>
                    <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Street</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Zip</th>

                    </tr>
                </thead>
                <tbody>  
                   
                <tr>
                    <td><?php echo $result['customer_id']; ?></td>
                    <td><?php echo $result['first_name']; ?></td>
                    <td><?php echo $result['last_name'] ?></td>
                    <td><?php echo $result['phone'] ?></td>
                    <td><?php echo $result['email_address'] ?></td>
                    <td><?php echo $result['street'] ?></td>
                    <td><?php echo $result['city'] ?></td>
                    <td><?php echo $result['state'] ?></td>
                    <td><?php echo $result['zip_code'] ?></td>
                </tr>
              
                </tbody>
                </table>
            </div>
        </div>        
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                </div>
                <table class="table table-striped">
                <thead>
                    <p class="custDescText" >Products Purchased</p>
                    <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody> 
          
                 <?php if ($prodResult->num_rows > 0): ?>
                    
                    <?php while($row = $prodResult->fetch_assoc()): ?>
              
                        <tr>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><?php echo $row['prod_desc']; ?></td>
                            <td><?php echo $row['quantity'] ?></td>
                        </tr>

                    <?php endwhile; ?>

                <?php else: ?>

                    <tr>
                    <td colspan="3" rowspan="1" headers="">No Data Found</td>
                    </tr>

                <?php endif; ?>
              
                </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>

</body>
</html>




