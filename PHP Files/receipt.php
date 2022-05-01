<?php

    include_once 'dbh.inc.php';
    include_once 'crud.php';
    include_once 'head.php';
    
?>
<title>Receipts</title>

<?php


    $crud = new crud();
    $result = $crud->getOrders();


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
                <div class="page-header mt-5 mb-5">
                    <h1>Sales</h1>
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Total</th>
                    
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if ($result->num_rows > 0): ?>
                    
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                        <td><?php echo $row['order_id'] ?></td>
                        <td><?php echo $row['employee_id'] ?></td>
                        <td><?php echo $row['customer_id'] ?></td>
                        <td><?php echo $row['order_date'] ?></td>
                        <td><?php echo $row['total'] ?></td>
                        <td>
                            <a href="receiptGenerated.php?id=<?php echo $row['order_id'] ?>" target="_blank" class="btn btn-primary">Receipt</a>
                        </td>

                    
                        
                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                    <td colspan="3" rowspan="1" headers="">No Data Found</td>
                    </tr>
                    <?php endif; ?>
                    <?php mysqli_free_result($result); ?>
                </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>
   
</body>
</html>